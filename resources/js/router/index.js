import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// qui andranno i componenti
import Index from '../pages/plates/Index.vue';
import show from '../pages/plates/show.vue'

// costante dove andranno le rotte
const routes = [
    {
        path: '/',
        name: 'restaurant.index',
        component: Index,
    },
    {
        path: '/restaurant/:slug',
        name: 'restaurant.show',
        component: show,
    },
];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router