// import { store } from "./store"

export const cartModule = {
    namespaced:  true,

    state: {
        cart: [],
        cartSummary: 'ciaone',
    },

    mutations: {

        updateCart( state ){               
            let storageCartItems = JSON.parse(localStorage.getItem("cart"))
            state.cart = storageCartItems             
        },



    },
    actions: {
        updateCartQuantity({commit}, payload){
            let storageCart = JSON.parse(localStorage.getItem('cart'))

            storageCart.forEach(plate => {
                if(plate.id === payload.plate.id){
                    plate.quantity = payload.plate.quantity
                }
            });

            localStorage.cart = JSON.stringify(storageCart)

            console.log(`Quantita ${payload.plate.quantity}`)

            commit('updateCart')
            
        },

        // aggiunta al carrello che viene invocato in show
        // devo acnche inserire gli articoli dentro localStorage.cart
        // non si puo fare il push in storage xke lì i dati sono solo stringe JSON
        addToStorageCart({commit}, payload ){
            // state.cart.push(plate)
            let storageCart = JSON.parse(localStorage.cart) // recupero tutti i piatti dal carrello generale
            //verifico l'esistenza del piatto dentro tale carrello
            let plateIndex = storageCart.findIndex(plate => plate.id === payload.plate.id)    
        
            if( plateIndex !== -1 ){                
                storageCart[plateIndex].quantity++                
            }else{ // se il piatto ancora non esiste devo prima di aggiungerlo creare la sua proprieta "quantity"
                payload.plate.quantity = 1
                storageCart.push(payload.plate)
                console.log(payload.plate.id)
                
                // console.log('non esiste')
            }

            localStorage.cart = JSON.stringify(storageCart)

            // console.log(`STORAGE CART ${localStorage.cart}`)

            commit('updateCart')
        },

        // removeFromCartStorage({commit}, payload){
        //     commit('removeFromCartStorage', payload.plate)
        // },
        removeFromCartStorage({commit}, payload ){
            //recupero gli item in storage
            let  storageCart = JSON.parse( localStorage.getItem('cart') );
            //cerco coincidenza con il plate per poterlo cancellare 
            storageCart.forEach( (item, index) => {
                if( item.id === payload.plate.id ){
                    storageCart.splice(index, 1) // cancello il plate con id corrispondente
                }
            });
            //aggiorno il local sotrage con il nuovo array senza l'elemento cancellato
            localStorage.cart = JSON.stringify( storageCart )
            //faccio un update del mio array che andrà a prendere i dati attuali del local storage
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