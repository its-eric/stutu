<template>
    <card :title="$t('your_info')">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active nav-item"><a class="nav-link active show" data-toggle="tab" href="#profile" role="tab">Profile </a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#editProfile" role="tab">Edit Profile</a></li>
            </ul>

            <div class="tab-content">
                <div id="profile" class="tab-pane in active">
                    <div class="panel-body">
                        <div class="col-lg-12 col-sm-12 follow-info">
                            <p>Hello I’m {{ user.name }}, a leading expert in interactive and creative design.</p>
                            <p>{{ user.name }}</p>
                            <p><i class="fa fa-twitter">{{ user.name }}</i></p>

                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <h4>Bio Graph</h4>
                            <div class="follow-ava">
                                <img src="img/avatar1.jpg" alt="">
                            </div>
                            <h6>{{ user.role }}</h6>

                            <div class="bio-row">
                                <p><span>Name: </span>{{ user.name }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Role: </span>{{ user.role }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email: </span>{{ user.email }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Birthday: </span>{{ user.birthday }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Gender: </span>{{ user.gender }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Experience: </span>{{ user.experience }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Url: </span>{{ user.url }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Expectation: </span>{{ user.expectation }}</p>
                            </div>
                        </div>

                        <!-- profile -->
                        <div id="profile" class="tab-pane active">
                            <section class="panel">
                                <div class="bio-graph-heading">
                                Hello I’m Bazouzou, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from ELTE University with a Master of Design majoring in visual communication.
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div id="editProfile" class="tab-pane fade">
                    <div class="panel-body">
                        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
                            <alert-success :form="form" :message="$t('info_updated')"/>

                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                                    <has-error :form="form" field="name"/>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                                    <has-error :form="form" field="email" />
                                </div>
                            </div>

                            <!-- Birthday -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('birthday') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.birthday" :class="{ 'is-invalid': form.errors.has('birthday') }" class="form-control" type="date" max="2000-01-01" name="birthday">
                                    <has-error :form="form" field="birthday" />
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="form-group row profile-gender">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('gender') }}</label>
                                <div class="col-md-7">
                                    <label class="radio-inline"><input v-model="form.gender" type="radio" name="gender" value="male">Male</label>
                                    <label class="radio-inline"><input v-model="form.gender" type="radio" name="gender" value="female">Female</label>
                                    <has-error :form="form" field="gender" />
                                </div>
                            </div>

                            <!-- Experience -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('experience') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.experience" :class="{ 'is-invalid': form.errors.has('experience') }" class="form-control" type="experience" name="experience">
                                    <has-error :form="form" field="experience" />
                                </div>
                            </div>

                            <!-- Url -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('url') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.url" :class="{ 'is-invalid': form.errors.has('url') }" class="form-control" type="url" name="url">
                                    <has-error :form="form" field="url" />
                                </div>
                            </div>

                            <!-- Expectation -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('expectation') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.expectation" :class="{ 'is-invalid': form.errors.has('expectation') }" class="form-control" type="expectation" name="expectation">
                                    <has-error :form="form" field="expectation" />
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row">
                                <div class="col-md-9 ml-md-auto">
                                    <v-button :loading="form.busy" type="success">{{ $t('update') }}</v-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </card>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      birthday: '',
      gender: '',
      experience: '',
      url: '',
      expectation: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key]
    })
  },

  methods: {
    async update () {
      const { data } = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    }
  }
}
</script>
