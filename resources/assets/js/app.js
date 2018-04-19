
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import devtools from '@vue/devtools';
import Vue from 'vue'
import VueMaterial from 'vue-material'
import VueRouter from 'vue-router'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default-dark.css'
import axios from 'axios'

import Auth from './auth.js'
import Api from './api.js'

window.Vue = Vue
window.auth = new Auth()
window.api = new Api()

if (process.env.NODE_ENV === 'development') {
    devtools.connect()
}

Vue.use(VueMaterial)
Vue.use(VueRouter)
Vue.use(axios)

import appComponent from './components/AppComponent.vue'
import loginComponent from './components/LoginComponent.vue'
import router from './routes.js'

const app = new Vue({
    el: '#stutu-app',

    router,

    components: {
        appComponent,
        loginComponent
    },
    
    data: () => ({
        menuVisible: false
    })
});