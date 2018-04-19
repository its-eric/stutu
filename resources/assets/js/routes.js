import VueRouter from 'vue-router'

import appComponent       from './components/AppComponent.vue'
import loginComponent     from './components/LoginComponent.vue'
import registerComponent  from './components/RegisterComponent.vue'
import dashboardComponent from './components/DashboardComponent.vue'

let routes = [
    { path: '/login', name: 'login', component: loginComponent },
    { path: '/register', name: 'register', component: registerComponent },
    { path: '/', name: 'dashboard', component: dashboardComponent, meta: { requiresAuth: true } },
    { path: '/logout', name: 'logout', component: loginComponent }
]

const router = new VueRouter({
    //base: '/',
    //mode: 'history',
    //history: true,
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuth)) {                
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next()
})

export default router