<template>

  <div class="cart_container ml-[20px] max-w-xl mx-auto my-4">
      <h1 class="font-bold text-xl mb-5">Carrello</h1>
      <div>
          <div v-if="restaurant_cart.length < 1 "> 
              <p>
                  Non ci sono articoli nel tuo carrello per questo ristorante <br>
                  Ricordati che puoi acquistare da un ristorante per volta.
              </p> 
          </div>
          <div v-else>
                
                <ul v-for="(plate, index) in restaurant_cart" :key="index">
                    <li class="flex justify-between items-center p-[20px] shadow-lg border-red">
                        <div class="cart-item-wrapper flex gap-[20px]">

                             <figure class="max-w-[80px] rounded-sm">
                                <img class="object-cover" :src="plate.image">
                            </figure>

                            <div class="item-info">
                                <h3>{{ plate.name }}</h3>
                                <p>Prezzo: {{formatCurrency(plate.price)}}</p>
                                <div class="quantity-wrapper flex gap-2"> 
                                    <!-- <button class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"
                                        @click.prevent="plate.quantity--"
                                    >-</button> -->

                                    <input type="number" class="w-[100px] text-center" v-model="plate.quantity">

                                    <!-- <button class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"
                                        @click.prevent="plate.quantity++"
                                    >+</button> -->
                                </div>
                            </div>

                        </div>

                        <div id="quantity">
                            <button class="bg-rose-700 text-slate-50 rounded-lg px-[15px] pointer"
                            @click.prevent="removeFromCart(plate)">Rimuovi</button>
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

                <!-- <router-link :to="{name: 'restaurant.index'}" class="text-stone-700 border border-deliveroo hover:text-white hover:bg-deliveroo px-2 py-1 rounded">
                    Ordina Ora
                </router-link> -->
        </div>
      </div>
  </div>
</template>

<script>
// import { mapState, mapActions } from 'vuex'
export default {
    data(){
        return{
            quantityController: 0, 
        }
    },
    props:[
        'restaurant_cart', 
        'formatCurrency'
    ],
    computed:{
        totalPrice(){
            this.cartTotalPrice = this.restaurant_cart.reduce( (acc, item) => {
                return acc + item.price
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
    // la quantità nel oggetto del piatto non cè, quindi verrà creata automaticamente.
        
        quantityIncrease( quantity ){
            let newquantity = quantity++
            return newquantity
        },

        quantityDecrease( plate ){
            while( plate.quantity > 1 ){
                plate.quantity--
                return plate.quantity
            }
            plate.quantity = 1
            console.log(plate.quantity);            
        },
       
    },

}
</script>

<style>

</style>