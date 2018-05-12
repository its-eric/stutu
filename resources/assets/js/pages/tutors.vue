<template>
  <card :title="$t('tutors')">
    <b-list-group v-for="(tutor, key) in tutors" :key="key">
      <b-list-group-item :to="{ name: 'tutor', params: { id: tutor.id } }" class="flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ tutor.name }}</h5>
        </div>
        <p class="mb-1">{{ course.description }}</p>
      </b-list-group-item>
    </b-list-group>
  </card>
</template>
<script>
import { mapGetters } from 'vuex'
import axios from 'axios'
const moment = require('moment')

export default {
  name: 'Tutors',

  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: () => ({
    tutors: '',
  }),

  mounted () {
    axios
      .get('api/tutors')
      .then(response => (this.tutors = response.data.data))
  },

  methods: {
    moment (date) {
      return moment(date).format('MMMM Do YYYY')
    }
  },

  metaInfo () {
    return { title: this.$t('courses') }
  },
}
</script>
