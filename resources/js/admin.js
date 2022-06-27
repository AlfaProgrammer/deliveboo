/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });


// // Register Form Validations 
// // const inputFields = document.getElementsByTagName('input');
// const password1 = document.getElementById('password');
// const password2 = document.getElementById('password-confirm');
// const form = document.getElementById('register-form');
// const errorMessage = document.getElementById('errorMessage');
// const submitButton = document.getElementById('register-submit-button');

// function validateForm(){
//     let isValid = form.checkValidity();
//     let err;
//     if(isValid){
//         return isValid
//     }
//     // check password match
//     if( password1.value === password2.value ){
//         err = 'La verifica della password non corrisponde'
//         return err
//     }

// }

// submitButton.addEventListener('click', validateBeforeSubmit(e) )

// function validateBeforeSubmit(e){
//     e.preventDefault();

//     if( validateForm() ){
//         form.submit();
//     }else{
//         errorMessage.textContent = validateForm();
//     }
// }

