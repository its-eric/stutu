<template>
  <card :title="$t('courses')">
    <b-list-group v-for="(course, key) in courses" :key="key">
      <b-list-group-item :to="{ name: 'course', params: { id: course.id } }" class="flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ course.name }}</h5>
          <small>{{ $t('last_updated_at') + ": " + moment(course.updated_at) }}</small>
        </div>
        <p class="mb-1">{{ course.description }}</p>
        <small class="text-muted">{{ $t('visit_the_page_of') + " " + course.owner.name }}</small>
      </b-list-group-item>
    </b-list-group>
  </card>
</template>
<script>
import { mapGetters } from 'vuex'
import axios from 'axios'
const moment = require('moment')

export default {
  name: 'Courses',

  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: () => ({
    courses: '',
  }),

  mounted () {
    axios
      .get('api/courses')
      .then(response => (this.courses = response.data.data))
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
