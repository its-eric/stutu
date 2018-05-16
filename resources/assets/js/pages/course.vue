<template>
  <card :title="course.name">
    <h3>{{ $t('a_course_by') + " " + course.owner.name }}</h3>
    {{ course.description }}
  </card>
</template>
<script>
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  name: 'Course',

  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: () => ({
    course: '',
  }),

  mounted () {
    axios
      .get('/api/courses/' + this.$route.params.id)
      .then(response => ( this.course = response.data ))
  },

  methods: {
    moment (date) {
      return moment(date).format('MMMM Do YYYY')
    }
  },

  metaInfo () {
    return { title: this.$t('course') }
  },
}
</script>
