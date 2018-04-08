<template>
  <div>
    <form novalidate class="md-layout" @submit.prevent="validateForm">
      <md-card class="md-layout-item md-size-50 md-small-size-100">
        <md-card-header>
            <div class="md-title">Login</div>
        </md-card-header>

        <md-card-content>
            <div class="md-layout md-gutter">
                <div class="md-layout-item md-small-size-100">
                    <md-field :class="getValidationClass('email')">
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
                        <md-input name="password" id="password" :disabled="sending">

                        <span class="md-error">
                            <strong>Example error</strong>
                        </span>

                        </md-input>
                    </md-field>
                </div>

                <label>
                    <md-checkbox name="remember" id="remember" v-model="form.remember" }}>
                        Remember Me
                    </md-checkbox>
                </label>

            </div>
        </md-card-content>
          
        <md-progress-bar md-mode="indeterminate" v-if="sending" />

        <md-card-actions>
          <md-button type="submit" class="md-primary" :disabled="sending">Login</md-button>
        </md-card-actions>
      </md-card>
    </form>
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
import {
  required,
  email,
  minLength,
  maxLength
} from 'vuelidate/lib/validators'

export default {
  name: 'login',
  mixins: [validationMixin],
  data: () => ({
    form: {
      email: null,
      password: null,
      remember: true
    },
    sending: false,
    lastUser: null
  }),
  validations: {
    form: {
      email: {
        required,
        email
      }
    }
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
      this.form.email = null
      this.form.password = null
      this.form.remember = false
    },
    logUserIn () {
      this.sending = true

      // Instead of this timeout, here you can call your API
      window.setTimeout(() => {
        this.lastUser = `${this.form.email}`
        this.userSaved = true
        this.sending = false
        this.clearForm()
      }, 1500)
    },
    validateForm () {
      this.$v.$touch()

      if (!this.$v.$invalid) {
        this.logUserIn()
      }
    }
  }
}
</script>