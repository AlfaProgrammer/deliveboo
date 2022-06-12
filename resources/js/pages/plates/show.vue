<template>

    <section class="img-show">

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div class="container main-wrapper" v-if="loading">

            <div class="cards-wrapper flex flex-col justify-between lg:flex-row ">
            
                <!-- <h1 class="font-bold text-xl mb-5">Piatti</h1> -->
                <div class="">

                    <nav class="mb-6 font-bold">
                        <router-link :to="{name: 'restaurant.index'}" class="text-stone-700 border border-deliveroo hover:text-white hover:bg-deliveroo px-2 py-1 rounded">
                            Ristoranti
                        </router-link>
                    </nav>

                    <!-- Info ristorante  -->
                    <div class="flex flex-wrap gap-3 mb-5">
                        <figure class="max-w-lg rounded-lg overflow-hidden shadow-lg shadow-stone-600">
                            <img :src="restaurant.image" class="restaurant-cover">
                        </figure>
                        <div class="grow ml-4">
                            <h1 class="font-bold text-4xl mb-3">{{restaurant.name}}</h1>
                            <div class="flex items-center gap-2">
                                <span v-for="category in restaurant.categories" :key="category.id" 
                                class="rounded-full bg-deliveroo mb-2 px-2 text-white font-bold">
                                    {{category.name}}
                                </span>
                            </div>
                            <div>
                                <span>📍 </span>{{restaurant.city}} - {{restaurant.address}}
                            </div>
                        </div>
                    </div>

                    <!-- Qui vengono stampati i piatti  -->
                    <div>
                        <h1 class="font-bold text-xl ml-[20px] mb-5">Piatti</h1>

                        <div v-if="plates.length == 0 ">
                            <p>Non ci sono piatti disponibili per questo ristorante</p>
                            <p>Torna alla pagina <router-link :to="{name: 'restaurant.index'}" class="text-deliveroo font-bold">Home</router-link> per sceglierne un'altro . . .</p>
                        </div>

                        <div v-else class="grid gap-10 plate-container mb-[15px]">
                            <div class="flex gap-3 bg-stone-100 p-4 rounded shadow-lg shadow-stone-600 plate-card border-2 border-transparent" 
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
                
                </div>

                <div class="">

                    <!-- {{cart}} -->
                    <!-- Carrello  -->
                    <AppCart 
                        :slug="slug"
                        :restaurant_cart="restaurant_cart"
                        :formatCurrency="formatCurrency"
                    />
                    
                </div>

            </div>

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
            quantity: 0,
            plates: null,
            slug: this.$route.params.slug,
            loading: false,
        }
    },
    computed:{
        ...mapState('cartModule', ['cart']), 
        
    },
     watch:{
        cart(){            
            this.updateRestaurantCart()
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
                .catch(err=>{
                    // console.log(err)                    
                    this.$router.push('/404');
                })            
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
            if(this.cart.length > 0){
                this.cart.forEach( item => {
                    // ora popolo l'array del singolo ristorante con gli elementi nel storageCart che gi appartengono
                    if(item.restaurant_id === this.restaurantId){
                        this.restaurant_cart.push(item)
                    }
                })
            }
            // aggiuntgo anche il parametro quantità ad ogni piatto aggiunto al carrello
            // questo parametro poi in verrà inviato in POST insieme a tutti gli altri dati
            // per creare l'ordine nel backend\
            // this.restaurant_cart.forEach(plate => {
            //     plate.quantity = 1 // assegno 1 di default visto che è un item aggiunto al carrello
            // })       
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

    .img-show {
        background-image: url('/img/wave5.svg');
        background-size: cover;
        background-position: center;
        background-repeat: no repeat;
        padding-bottom: 20px;
        min-height: calc((100vh - 62px) - 341px);
        display: flex;
    }

    .main-wrapper {
        display: flex;
        justify-content: center;
    }

    .cards-wrapper {
        justify-content: space-between;
        width: 100%;
        padding-top: 50px;
    }

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