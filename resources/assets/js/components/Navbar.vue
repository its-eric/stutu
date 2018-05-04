<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
        {{ appName }}
      </router-link>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false">
        <span class="navbar-toggler-icon"/>
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <locale-dropdown/>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
          <li class="nav-item">
            <router-link :to="{ name: 'home' }" class="nav-link">
              <i class="icon_house_alt"></i>
              <span>{{ $t('dashboard') }}</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'inbox' }" class="nav-link">
              <i class="glyphicon glyphicon-envelope"></i>
              <span>{{ $t('inbox') }}</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'courses' }" class="nav-link">
              <i class="icon_table"></i>
              <span>{{ $t('courses') }}</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </router-link>
          </li>
        </ul>

        <!-- Authenticated -->
        <li v-if="user" class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle"
              href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
            {{ user.name }}
          </a>
          <div class="dropdown-menu">
            <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
              <fa icon="cog" fixed-width/>
              {{ $t('settings') }}
            </router-link>

            <div class="dropdown-divider"/>
            <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
              <fa icon="sign-out-alt" fixed-width/>
              {{ $t('logout') }}
            </a>
          </div>
        </li>
        <!-- Guest -->
        <template v-else>
          <li class="navbar-nav nav-item">
            <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
              {{ $t('login') }}
            </router-link>
            <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
              {{ $t('register') }}
            </router-link>
          </li>
        </template>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
