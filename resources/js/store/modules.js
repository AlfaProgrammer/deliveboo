// import { store } from "./store"

export const cartModule = {
    namespaced:  true,

    state: {
        cart: [],
        // cartCreated: false
        // slug: this.$route.params.slug,


    },
    mutations: {

        removeFromCart(){},

        updateCart( state ){

                //svuoto prima il mio carrello
                state.cart = []
                // mi prento tuttti gli item in storage cart 
                let storageCartItems = JSON.parse(localStorage.getItem("cart"))
                // li inserisco nel mio carrello
                storageCartItems.forEach(item => {
                    state.cart.push(item)
                    console.log('push')
                });

                state.cart = storageCartItems
                // console.log('storageCartItems', storageCartItems)
            
        }
    },
    actions: {
        // aggiunta al carrello che viene invocato in show
        // devo acnche inserire gli articoli dentro localStorage.cart
        // non si puo fare il push in storage xke lì i dati sono solo stringe JSON
        addToStorageCart({commit}, payload ){
            // state.cart.push(plate)
            let storageCart = JSON.parse(localStorage.cart)
            storageCart.push(payload.plate)
            localStorage.cart = JSON.stringify(storageCart)

            console.log(`STORAGE CART ${localStorage.cart}`)

            commit('updateCart')
        },

        createCartStorage( state ){ 
            let cart = []           
            localStorage.setItem('cart', JSON.stringify(cart))
            // state.cartCreated = true         
        },

        updateCart({ commit }){
            // let storageCartItems = localStorage.getItem('cart')
            commit('updateCart')
        }

    },

    getters:{
        // non li utilizziamo perche useremo la funzione helper mapState per il momento
        // se dovessimo fare dei calcoli prima di restituire una proprieta in state, utilizzeremo i getter.
    }
}