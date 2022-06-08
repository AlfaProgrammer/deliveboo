<template>

  <div>
      <h1 class="font-bold text-xl mt-5 mb-5">Il tuo Carrello</h1>

      <div>
          <div v-if="cart.length < 1 "> 
              <p>Non ci sono articoli nel tuo carrello</p> 
          </div>
          <div class=" flex" v-else>

                <div class="totalPrice p-4 rounded shadow-lg shadow-stone-600">
                    <p>Totale provvisorio: {{formatCurrency(cartTotal)}}</p>

                    <ul v-for="(plate, index) in cart" :key="index">

                        <li class="flex justify-between items-center p-[20px] shadow-lg border-red">
                            <div class="cart-item-wrapper flex gap-[20px]">

                                <figure class="max-w-[80px] rounded-sm">
                                    <img class="object-cover" :src="plate.image">
                                </figure>

                                <div class="item-info">
                                    <h3>{{ plate.name }}</h3>
                                    <p>{{formatCurrency(plate.price)}}</p>
                                </div>

                            </div>

                            <div id="quantity">
                                <p>Quantità</p>
                                <button @click="removeFromCart(plate)">Rimuovi</button>
                            </div>

                        </li>

                    </ul> 

                </div>
        </div>
      </div>

  </div>
</template>

<script>
import {mapState, mapActions} from 'vuex';
export default {
    props:[
        // 'slug',  // ho bisogno dello slug da passare alla chiamata in store.js 
        // 'plates'
        'formatCurrency'
    ],
    computed: {
        // fatto minding del path al modulo cartModule per recuperare l'árray cart
        ...mapState('cartModule', ['cart', 'cartTotal']),

    },
    methods:{
        ...mapActions('cartModule', [
            // 'fillCartFromStorage',
            'createCartStorage',
            'updateCart',
        ]),
        removeFromCart(plate){
            this.$store.dispatch({
                type: 'cartModule/removeFromCartStorage',
                plate: plate
            })
        }
       
    },

    beforeMount(){
        if( ! localStorage.cart ){
            this.createCartStorage()
        } else {
            this.updateCart()
        }     
    }
}
</script>

<style>

</style>