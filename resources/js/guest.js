/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


//require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */

/**
 * 
 */
import vueBraintree from 'vue-braintree';
Vue.use(vueBraintree);

import { ValidationProvider } from 'vee-validate';
import { ValidationObserver } from 'vee-validate';
import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules'; //* importare regole validazioni *//
import { messages } from 'vee-validate/dist/locale/it.json'; //* recupero msg ita *//

//* assegnazione regole validazioni e relativi messaggi *//
Object.keys(rules).forEach(rule => {
  extend(rule, {
    ...rules[rule], // copies rule configuration
    message: messages[rule] // assegno messaggi importati sopra alle regole
  });
});

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

 import '../sass/front.scss';
 import App from './views/App.vue';
 import router from './router';
 import {store} from './store/store';
import Vue from 'vue';
 
 const app = new Vue({
     store,
     router,
     el: '#app',
     render: h=>h(App)
 });

//  app.use(store)