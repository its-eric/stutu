<template>
  <card :title="tutor.name">
    <h3>Coming soon</h3>
  </card>
</template>
<script>
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  name: 'Tutor',

  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: () => ({
    tutor: '',
  }),

  mounted () {
    axios
      .get('/api/tutors/' + this.$route.params.id)
      .then(response => ( this.tutor = response.data ))
  },

  methods: {
    moment (date) {
      return moment(date).format('MMMM Do YYYY')
    }
  },

  metaInfo () {
    return { title: this.$t('tutor') }
  },
}
</script>
