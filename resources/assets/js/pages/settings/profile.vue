<template>
    <card :title="$t('your_info')">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#profile">Profile </a></li>
                <li><a data-toggle="pill" href="#editProfile">Edit Profile</a></li>
            </ul>

            <div class="tab-content">
                <div id="profile" class="tab-pane in active">
                    <div class="panel-body">
                        <div class="col-lg-12 col-sm-12">
                            <h4>{{ user.name }}</h4>
                            <div class="follow-ava">
                                <img src="img/butters.gif" alt="">
                            </div>
                            <h6>{{ user.role }}</h6>
                        </div>
                        <div class="col-lg-12 col-sm-12 follow-info">
                            <p>Hello I’m {{ user.name }}, a leading expert in interactive and creative design.</p>
                            <p>{{ user.name }}</p>
                            <p><i class="fa fa-twitter">{{ user.name }}</i></p>
                            <h6>
                                <span><i class="icon_clock_alt"></i>11:00 PM</span>
                                <span><i class="icon_calendar"></i>16.04.18</span>
                                <span><i class="icon_pin_alt"></i>HU</span>
                            </h6>
                        </div>
                        <!-- profile -->
                        <div id="profile" class="tab-pane active">
                            <section class="panel">
                                <div class="bio-graph-heading">
                                Hello I’m Bazouzou, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from ELTE University with a Master of Design majoring in visual communication.
                                </div>
                                <div class="panel-body bio-graph-info">
                                    <h1>Bio Graph</h1>
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>First Name: </span>Bazouzou </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Last Name: </span>Kranjcec</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Birthday: </span>1 January 1990</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Country: </span>Hungary</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Occupation: </span>UI Designer</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Email: </span>bazouzou@mailname.com</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Mobile: </span>(+6283) 456 789</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Phone: </span>(+021) 956 789123</p>
                                        </div>
                                    </div>
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

                            <!-- Experience -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('experience') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.experience" :class="{ 'is-invalid': form.errors.has('experience') }" class="form-control" type="experience" name="experience">
                                    <has-error :form="form" field="experience" />
                                </div>
                            </div>

                            <!-- url -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ $t('url') }}</label>
                                <div class="col-md-7">
                                    <input v-model="form.url" :class="{ 'is-invalid': form.errors.has('url') }" class="form-control" type="url" name="url">
                                    <has-error :form="form" field="url" />
                                </div>
                            </div>

                            <!-- expectation -->
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
