<template>
    <md-app md-mode="reveal">
    <md-app-toolbar class="md-primary">
        <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
            <md-icon>menu</md-icon>
        </md-button>
        <span class="md-title"><router-link :to="{ name: 'dashboard' }"></router-link></span>
    </md-app-toolbar>

    <md-app-drawer :md-active.sync="menuVisible">
        <md-toolbar class="md-transparent" md-elevation="0">
        Navigation
        </md-toolbar>

        <md-list>
        <md-list-item>
            <md-icon>home</md-icon> 
            <span class="md-list-item-text">
                <div v-if="authenticated && user">
                  <p>Hello, {{ user.name }}</p>
                  <router-link :to="{ name: 'logout' }">Logout</router-link>
                </div>
                <router-link :to="{ name: 'login' }" v-else>Login</router-link>    
            </span>
        </md-list-item>
        <md-list-item>
            <md-icon>face</md-icon>
            <span class="md-list-item-text">
                <router-link :to="{ name: 'register' }">Register</router-link>
            </span>
        </md-list-item>
        <md-list-item>
            <md-icon>exit_to_app</md-icon>
            <span class="md-list-item-text">
                <router-link :to="{ name: 'logout' }">Logout</router-link>
            </span>
        </md-list-item>

        </md-list>
    </md-app-drawer>

    <md-app-content>
        <router-view></router-view>
    </md-app-content>
</md-app>
</template>
<script>
    export default {
      data() {
        return {
          authenticated: auth.check(),
          user: auth.user,
          menuVisible: false,     
        }
      },

      mounted() {
        this.$on('userLoggedIn', () => {
            this.authenticated = true;
            this.user = auth.user;
        });
      },

    }
</script>