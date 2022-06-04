// Importo vue e vuex
import Vue from 'vue';
import Vuex from 'vuex';

// dico a vue che usero Vuex
Vue.use(Vuex)
// creo lo store 

//importo il modulo moduleCart da modules.js 
import { cartModule } from './modules'

// qui vado a costruitre il mio store generale che cmq può contere più moduli
export const store = new Vuex.Store({
    modules: {
        cartModule: cartModule
    },
    
    state: {
        restaurants:[],

    },
    mutations: {},
    actions: {},
    getters: {},
})