<template>

    <div class="cart_container ml-[20px] max-w-xl mx-auto my-4">

        <h1 class="font-bold text-xl mb-5">Carrello</h1>

        <div v-if="restaurant_cart.length < 1 "> 
            <p>
                Non ci sono articoli nel tuo carrello per questo ristorante <br>
                Ricordati che puoi acquistare da un ristorante per volta.
            </p> 
        </div>        
            
        <div v-else class=" flex">

            <div class="totalPrice p-4 rounded shadow-lg shadow-stone-600">
                <p>Totale provvisorio: {{formatCurrency(totalPrice)}}</p>

                <ul v-for="(plate, index) in restaurant_cart" :key="index">
                    <li class="flex justify-between items-center p-[20px] shadow-lg border-red">
                        <div class="cart-item-wrapper flex gap-[20px]">

                            <figure class="max-w-[80px] rounded-sm">
                                <img class="object-cover" :src="plate.image">
                            </figure>

                            <div class="item-info">
                                <h3>{{ plate.name }}</h3>
                                <p>Prezzo: {{formatCurrency(plate.price)}}</p>
                            </div>

                            <div id="plate-state">
                                <p>Quantità: {{plate.quantity}}</p>
                                <button @click="removeFromCart(plate)">Rimuovi</button>
                            </div>

                            <div class="item-info">
                                <h3>{{ plate.name }}</h3>
                                <p>Prezzo: {{formatCurrency(plate.price)}}</p>

                                <div class="quantity-wrapper flex gap-2"> 

                                    <input @keypress.prevent @change="info(plate)" type="number" class="w-[100px] text-center" min="1" v-model="plate.quantity">

                                </div>
                            </div>
                        </div>
                    </li>
                </ul> 

                <div class="totalPrice">
                    <p>Totale: {{formatCurrency(totalPrice)}}</p>
                </div>

                <button 
                    class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"                    
                >
                    Ordina Ora
                </button>
                
            </div>
        </div>        
    </div>

</template>

<script>
// import { mapMutations } from 'vuex'
export default {
    props:[
        'restaurant_cart', 
        'formatCurrency'
    ],
    computed:{
        totalPrice(){
            this.cartTotalPrice = this.restaurant_cart.reduce( (acc, item) => {
                return acc + item.price * item.quantity
            }, 0) 
            return this.cartTotalPrice
        },
    },
   
    methods:{        
        removeFromCart(plate){
            this.$store.dispatch({
                type: 'cartModule/removeFromCartStorage',
                plate: plate
            })
        },
        info(plate){           
            this.$store.dispatch({
                type: 'cartModule/updateCartQuantity',
                plate: plate
            })

            // console.log(`Plate quantity ${plate.quantity}`)
            
        }
    // la quantità nel oggetto del piatto non cè, quindi verrà creata automaticamente.
       
    },
}
</script>

<style lang="scss" scoped>
</style>