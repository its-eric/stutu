<template>
  <card :title="$t('home')">
    <!-- container section start -->
    <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

          <!-- project team & activity start -->
          <div class="row">
            
            <div class="col-lg-8">
              <!--Project Activity start-->
              <section class="panel">
                <div class="panel-body progress-panel">
                  <div class="row">
                    <div class="col-lg-8 task-progress pull-left">
                      <h1>{{ $t('hi') + ", " + user.name }}</h1>
                    </div>
                    <div class="col-lg-4">
                      <span class="profile-ava pull-right">
                        <img alt="" class="simple" :src="user.photo_url">
                      </span>
                      {{ posts }}
                    </div>
                  </div>
                </div>
              </section>  
              <!--Project Activity end-->
            </div>
          </div><br><br>

          <div class="row">
            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><strong>Calendar</strong></h2>
                  <div class="panel-actions">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>

                </div><br><br><br>
                <div class="panel-body">
                  <!-- Widget content -->

                  <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                  <div id="calendar"></div>

                </div>
              </div>

            </div>

            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Quick Post</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div>
                      <b-form-group
                        id="quickpost_fieldset1"
                        label="Title your post"
                        label-for="post-title"
                        :class="{ 'is-invalid': newPostForm.errors.has('title') }"
                    >
                        <b-form-input id="post-title" v-model.trim="newPostForm.title"></b-form-input>
                      </b-form-group>
                    </div>

                    <div>
                      <b-form-group
                        id="quickpost_fieldset2"
                        label="Enter the content"
                        label-for="post-content"
                        :class="{ 'is-invalid': newPostForm.errors.has('content') }"
                      >
                        <b-form-textarea
                          id="post-content"
                          v-model="newPostForm.content"
                          :rows="5"
                          :max-rows="15"
                        ></b-form-textarea>
                        <pre class="mt-3">{{ newPostForm.content }}</pre>
                      </b-form-group>
                    </div>

                    <div>
                      <b-form-select v-model="newPostForm.status" :options="postStatuses" class="mb-3" />
                    </div>

                    <button class="btn btn-primary ml-auto" type="submit" @click="publishPost">
                      {{ $t('publish') }}
                    </button>
                    <button class="btn btn-danger ml-auto" type="submit" @click="savePostDraft">
                      {{ $t('save_draft') }}
                    </button>
                    <button class="btn btn-default ml-auto" type="reset" @click="resetNewPost">
                      {{ $t('reset_form') }}
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- project team & activity end -->

        </section>

      </section>

    </section>
  </card>

</template>

<script>
import { mapGetters } from 'vuex'
import { Form } from 'vform'

export default {
  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user',
  }),

  data: () => ({
    newPostFormStatus: '',
    newPostForm: new Form({
      title: '',
      content: '',
      status: null,
    }),
    postStatuses: [
      'Todo',
      'Done',
    ]
  }),

  methods: {
    async savePostDraft () {
      const { data } = await this.newPostForm.post('/api/posts/drafts/new')

      this.status = data.status

      resetNewPost()
    },

    async publishPost () {
      const { data } = await this.newPostForm.post('/api/post')

      this.status = data.status

      resetNewPost()
    },

    resetNewPost () {
      this.newPostForm.reset()
    },
  },

  metaInfo () {
    return { title: this.$t('home') }
  },
}
</script>
