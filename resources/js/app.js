require('./bootstrap');

import Vue from 'vue';  
import VueRouter from 'vue-router';


Vue.use(VueRouter);


import Home from './components/Home.vue';
import Test from './components/Test.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';




const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home'
    },
    {
        path: '/test',
        component: Test,
        name: 'Test'
    },
    {
        path: '/register',
        component: Register,
        name: 'Register'
    },
    {
        path: '/login',
        component: Login,
        name: 'Login'
    },
    {
        path:'/dashboard',
        component: Dashboard,
        name: 'Dashboard',
        beforeEnter: (to, from, next) => {
            axios.get('/api/authentificated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'Login'})
            })
        }
    },
    
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    router: router
});
