<template>
  <div>
      <h1 class="font-bold text-xl mb-5">Carrello</h1>

      <div>
          <div v-if="cart.length < 1 "> 
              <p>Non ci sono articoli nel tuo carrello</p> 
          </div>
          <div v-else>
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
                            Quantità
                        </div>
                    </li>
                </ul> 
          </div>
        <!-- <button @click="addToCart(plate)">GEt Storage Items</button> -->
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
        ...mapState('cartModule', ['cart']),

    },
    methods:{
        ...mapActions('cartModule', [
            // 'fillCartFromStorage',
            'createCartStorage',
            'updateCart'
        ]),
       
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