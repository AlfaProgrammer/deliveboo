// Importo vue e vuex
import Vue from 'vue';
import Vuex from 'vuex';

// dico a vue che usero Vuex
Vue.use(Vuex)
// creo lo store 
export const store = new Vuex.Store({
    state: {
        porducts: [],
        cart: [],
        order: []

    },
    mutations: {

    },
    actions: {

    },

})