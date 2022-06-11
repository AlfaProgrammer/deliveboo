import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// qui andranno i componenti
import Index from '../pages/plates/Index.vue';
import show from '../pages/plates/show.vue';
import payments from '../pages/payments/Payment.vue';
import form from '../pages/orders/Form.vue';
import order from '../pages/orders/Show.vue';

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
    {
        path: '/payments',
        name: 'payments.index',
        component: payments
    },
    {
        path: '/orders',
        name: 'order.create',
        component: form,
    },
    {
        path: '/orders/show',
        name: 'orders.show',
        component: order,
    },
];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router