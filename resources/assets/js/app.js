
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import devtools from '@vue/devtools';
import Vue from 'vue';
import VueMaterial from 'vue-material';
import VueRouter from 'vue-router';
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default-dark.css';

window.Vue = Vue;

if (process.env.NODE_ENV === 'development') {
    devtools.connect();
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import appComponent      from './components/AppComponent.vue';
import loginComponent    from './components/RegisterComponent.vue';
import registerComponent from './components/LoginComponent.vue';
Vue.use(VueMaterial);
Vue.use(VueRouter);

const routes = [
    { path: '/', name: 'app', component: appComponent },
    { path: '/login', name: 'login', component: loginComponent },
    { path: '/register', name: 'register', component: registerComponent },
    //{ path: '/home', component: dashboardComponent }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

const app = new Vue({
    el: '#stutu-app',

    router,

    components: {
        appComponent
    },

    data: () => ({
        menuVisible: false
    })
});