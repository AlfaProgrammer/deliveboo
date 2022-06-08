<template>

    <section class="">

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div class="container" v-if="loading">

            <nav class="mb-6 font-bold">
                <router-link :to="{name: 'restaurant.index'}" class="text-stone-700 border border-deliveroo hover:text-white hover:bg-deliveroo px-2 py-1 rounded">
                    Ristoranti
                </router-link>
            </nav>

            <!-- Info ristorante  -->
            <div class="flex flex-wrap gap-3 mb-5">
                <figure class="max-w-lg rounded-lg overflow-hidden">
                    <img :src="restaurant.image" class="restaurant-cover">
                </figure>
                <div class="grow">
                    <h1 class="font-bold text-4xl mb-3">{{restaurant.name}}</h1>
                    <div class="flex items-center gap-2">
                        <span v-for="category in restaurant.categories" :key="category.id" 
                        class="rounded-full bg-deliveroo mb-2 px-2 text-white font-bold">
                            {{category.name}}
                        </span>
                    </div>
                    <div>
                        {{restaurant.city}} - {{restaurant.address}}
                    </div>
                </div>
            </div>
            
            <!-- Qui vengono stampati i piatti  -->
            <div>
                <h1 class="font-bold text-xl mb-5">Piatti</h1>

                <div class="grid gap-10 plate-container">
                    <div class="flex gap-3 bg-stone-100 p-4 rounded shadow-lg shadow-stone-300 plate-card border-2 border-transparent" 
                    v-for="plate in plates" :key="plate.id">
                        <div class="grow">
                            <p class="font-bold mb-3">{{plate.name}}</p>
                            <div>
                                <p class="mb-[10px]">{{formatCurrency(plate.price)}}</p>
                                <button 
                                    class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"
                                    @click="addToCart(plate)"
                                >
                                    Add to Cart
                                </button>
                            </div>  
                        </div>
                        <figure class="max-w-[80px] rounded-sm">
                            <img class="object-cover" :src="plate.image">
                        </figure>

                    </div>
                </div>
            </div>
            <!-- {{cart}} -->
            <!-- Carrello  -->
            <AppCart 
                :plates="plates"
                :restaurant_cart="restaurant_cart"
                :formatCurrency="formatCurrency"
            />

        </div>
    </section>

</template>

// -----------------------------------------------------------------
// JS

<script>
import CssLoaders from '../../components/CssLoaders.vue';
import AppCart from '../../components/AppCart.vue';
import { mapState, mapActions } from 'vuex'

export default {
    data(){
        return {
            restaurant: null,
            restaurant_cart: [],
            restaurantId: null,
            // cart = null,
            plates: null,
            slug: this.$route.params.slug,
            loading: false,
        }
    },
    computed:{
        ...mapState('cartModule', ['cart']), 
        
    },
     watch:{
        cart(newCart, oldCart){            
            this.updateRestaurantCart()
            // console.log('aggiunto porco dio')
            // console.log(this.restaurant_cart.length)
        },
        loading(){
            if(this.loading == true){
                this.updateRestaurantCart()
            }
        }
    },

    components: {
        CssLoaders,
        AppCart,

    },
    methods: {

        addToCart( plate ){
            this.$store.dispatch({
                type: 'cartModule/addToStorageCart',
                plate: plate
            })
        },

        formatCurrency( price ){
            // price = (price / 100);
            return (price.toLocaleString('it-IT', { style: 'currency', currency: 'EUR'}))
        },

        fetchRestaurant() {
            axios.get(`/api/restaurants/${this.slug}`)
                .then(res => {
                    /* this.restaurant = res.data */
                    const {restaurant, plates} = res.data;
                    this.restaurant = restaurant;
                    this.restaurantId = restaurant.id;
                    this.plates = plates;
                    // console.log(this.restaurant);
                    this.loading = true;
                    // console.log(res.data);
                })
                /* .catch(err => {
                    this.router.push('/404');
                }) */            
        },

        // QUI ci sono le chiamate alle actions in nel cartModule di store.js

        ...mapActions('cartModule', [
            // 'fillCartFromStorage',
            'createCartStorage',
            'updateCart',
        ]),
        
        
        //assegnazione item corrispondenti al ristorante presi da cart, che contiene tutti
        // i prodotti aggiunti

        // assegnazione degli degli item in restaurant_cart_data 
        updateRestaurantCart(){     
            this.restaurant_cart = [ ]
            // this.restaurant_cart = this.cart.filter( item => {
            //     console.log(item.restaurant_id)
            //     console.log(this.restaurantId)
            //     item.restaurant_id === this.restaurantId
            // })  
            if(this.cart.length > 0){
                this.cart.forEach( item => {
                    if(item.restaurant_id === this.restaurantId){
                        this.restaurant_cart.push(item)
                    }
                })
            }
            console.log(this.restaurant_cart.length)        
        }

       
    },
    created() {
        this.fetchRestaurant()

        if( ! localStorage.cart ){
            this.createCartStorage()
        } else {
            this.updateCart()
        } 
             

    },
}
</script>

// -----------------------------------------------------------------
// CSS

<style lang="scss" scoped>

    img {
        aspect-ratio: 1;
    }

    .restaurant-cover {
        aspect-ratio: 16/9;
    }

    .plate-container {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    }

    .plate-card{
        transition: transform 350ms;
    }

    .plate-card:hover{
        // cursor: pointer;
        border-color:#440063;
        transform: scale(1.1);
        transition: transform 150ms;
    }

</style>