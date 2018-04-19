<template>
    <form novalidate class="md-layout" @submit.prevent="validateForm">
      <md-card class="md-layout-item md-small-size-100">
        <md-card-header>
            <div class="md-title">Register</div>
        </md-card-header>

        <md-card-content>
          <!-- INCLUDE CSRF -->
          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('name')">
                <label for="name">Name</label>
                <md-input name="name" id="name" v-model="form.name" :disabled="sending" autofocus />
                <span class="md-error">
                  <strong>Example error</strong>
                </span>
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('email')">
                <label for="email">E-mail address</label>
                <md-input name="email" id="email" v-model="form.email" :disabled="sending" autofocus />
                <span class="md-error">
                  <strong>Example error</strong>
                </span>
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('password')">
                <label for="password">Password</label>
                <md-input name="password" id="password" v-model="form.password" :disabled="sending" autofocus />
                <span class="md-error">
                  <strong>Example error</strong>
                </span>
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('password-confirm')">
                <label for="password-confirm">Confirm your password</label>
                <md-input name="password-confirm" id="password-confirm" v-model="form.passwordConfirm" :disabled="sending" autofocus />
                <span class="md-error">
                  <strong>Example error</strong>
                </span>
              </md-field>
            </div>
          </div>

          <div>
            <md-radio v-model="form.role" value="tutor">Tutor</md-radio>
            <md-radio v-model="form.role" value="student">Student</md-radio>
          </div>


        </md-card-content>
      </md-card>
    </form>
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
  mixins: [validationMixin],
  data: () => ({
    form: {
      email: '',
      password: '',
      passwordConfirm: '',
      role: 'student',
    },
    sending: false
  }),
  validations: {
    form: {
      email: {
        required,
        email
      },
      password: {

      },
      passwordConfirm: {

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
      this.form.email = ''
      this.form.password = ''
      this.form.passwordConfirm = ''
    },
    registerUser () {
      this.sending = true
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
