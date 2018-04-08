<template>
    <md-app md-mode="reveal">
    <md-app-toolbar class="md-primary">
        <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
            <md-icon>menu</md-icon>
        </md-button>
        <span class="md-title"><router-link :to="{ name: 'app' }"></router-link></span>
    </md-app-toolbar>

    <md-app-drawer :md-active.sync="menuVisible">
        <md-toolbar class="md-transparent" md-elevation="0">
        Navigation
        </md-toolbar>

        <md-list>
        @guest
        <md-list-item>
            <span class="md-list-item-text">
                <router-link to="login">{{ __('Login') }}</router-link>    
            </span>
        </md-list-item>
        <md-list-item>
            <span class="md-list-item-text">
                <router-link to="register">{{ __('Register') }}</router-link>
            </span>
        </md-list-item>
        @else
        <md-list-item>
            <md-icon>exit_to_app</md-icon>
            <span class="md-list-item-text">
                <router-link to="logout">{{ __('Logout') }}</router-link>
            </span>
        </md-list-item>

        <form id="logout-form" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
        </md-list>
    </md-app-drawer>

    <md-app-content>
        <router-view></router-view>
    </md-app-content>
</md-app>
</template>
<script>
    export default {}
</script>