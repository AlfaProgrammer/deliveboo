import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// qui andranno i componenti
import Index from '../pages/plates/Index.vue';

// costante dove andranno le rotte
const routes = [
    {
        path: '/',
        name: 'plates.index',
        component: Index,
    },
];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router