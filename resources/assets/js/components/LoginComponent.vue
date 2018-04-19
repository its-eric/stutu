<template>
    <form novalidate class="md-layout" @submit.prevent="validateForm">
      <md-card class="md-layout-item md-small-size-100">
        <md-card-header>
            <div class="md-title">Login</div>
        </md-card-header>

        <md-card-content>
            <div class="md-layout md-gutter">
                <div class="md-layout-item md-small-size-100">
                    <md-field>
                        <label for="email">E-Mail Address</label>
                        <md-input name="email" id="email" v-model="form.email" :disabled="sending" autofocus />

                        <span class="md-error">
                          <strong>Example error</strong>
                        </span>
                    </md-field>
                </div>

                <div class="md-layout-item md-small-size-100">
                    <md-field>
                        <label for="password">Password</label>
                        <md-input name="password" type="password" v-model="form.password" id="password" :disabled="sending">

                        <span class="md-error">
                            <strong>Example error</strong>
                        </span>

                        </md-input>
                    </md-field>
                </div>
            </div>

            <div class="md-gutter md-layout">
                <div class="md-layout-item md-small-size-100">
                  <label>
                    <md-checkbox name="remember" id="remember" v-model="form.remember">
                        Remember Me
                    </md-checkbox>
                  </label>
                </div>
                

                <md-card-actions>
                  <md-button type="submit" class="md-primary" :disabled="sending">Login</md-button>
                </md-card-actions>
            </div>
        </md-card-content>
          
        <md-progress-bar md-mode="indeterminate" v-if="sending" />

      </md-card>
    </form>
</template>

<script>
import { validationMixin } from 'vuelidate'
import {
  required,
  email,
  minLength,
  maxLength,
  password,
  sameAs
} from 'vuelidate/lib/validators'

export default {
  mixins: [validationMixin],
  data: function () { return {
    form: {
      email: '',
      password: '',
      remember: true
    },
    sending: false,
    token: '',
    user: ''
  }},
  validations: {
    form: {
      email: {
        required,
        email
      },
      password: {
      },
  },
  methods: {
    getValidationClass (fieldName) {
      const field = this.$v.form[fieldName]

      if (field) {
        return {
          'md-invalid': field.$invalid && field.$dirty
        }
      }
    },
    clearForm () {
      this.$v.$reset()
      this.form.email = ''
      this.form.password = ''
      this.form.remember = false
      this.sending = false
    },
    logUserIn () {
      this.sending = true

      let data = {
        email: this.form.email,
        password: this.form.password,
        token: this.token,
        user: this.form.email
      }

      this.axios.post('localhost/api/login', data)
        .then(({data}) => {
          auth.login(data.token, data.user)
          this.$router.push('/dashboard')
        })
        .catch(error => {
          console.log(error)
          this.clearForm()
        })
    },
    validateForm () {
      this.$v.$touch()

      if (!this.$v.$invalid) {
        this.logUserIn()
      }
    }
  }
}
}
</script>