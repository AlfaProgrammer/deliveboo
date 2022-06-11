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
                                <button @click="modalShowToggle(plate)">Rimuovi</button>
                            </div>

                            <div class="item-info">
                                <h3>{{ plate.name }}</h3>
                                <p>Prezzo: {{formatCurrency(plate.price)}}</p>

                                <div class="quantity-wrapper flex gap-2 items-center"> 

                                    <button  @click="decreaseQuantity(plate)" class="font-bold">-</button>
                                    <div class="font-bold text-white">{{plate.quantity}}</div>
                                    <button  @click="increaseQuantity(plate)" class="font-bold">+</button>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul> 

                <div class="totalPrice">
                    <p>Totale: {{formatCurrency(totalPrice)}}</p>
                </div>
                <!-- <router-link :to="{name: 'order.create'}" @click="console.log('ciao')" class="bg-sky-500/100 text-white rounded-lg px-[15px] pointer">
                    Ordina Ora
                </router-link>   -->
                <button 
                    class="bg-sky-500/100 text-white rounded-lg px-[15px] pointer"   
                    @click="createOrderCart(restaurant_cart, slug), goToOrder()"                 
                >
                    Ordina Ora
                </button>           
            </div>
        </div>   

         <!-- MODALE CONFERMA RIMOZIONE dal CARRELLO -->
        <div id="modal" class="flex item-center justify-center" :class="[modalShow ? '': 'hidden']">
            <div id="modal-info" 
            class="max-h-[50%] bg-stone-100 p-4 rounded shadow-lg shadow-stone-600 plate-card border-2 border-transparent">
                
                <h3 class="font-bold mb-3 text-xl">Sei sicuro di voler eliminare questo piatto ?</h3>

                <p class="font-bold mb-3">{{plateInModal.name}}</p>

                <figure class="max-w-[80px] rounded-sm mb-3">
                    <img class="object-cover" :src="plateInModal.image">
                </figure> 

                <p class="mb-3">Quantità: {{plateInModal.quantity}}</p>

                <div>
                    <!-- <p class="mb-[10px]">{{formatCurrency(plateInModal.price)}}</p> -->
                    <button 
                        class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"
                        @click="removeFromCart(plateInModal)"
                    >
                        Elimina
                    </button>

                    <button 
                        class="text-slate-50 bg-deliveroo rounded-lg px-[15px] pointer"
                        @click="modalShow = !modalShow"
                    >
                        Annulla
                    </button>
                </div>

            </div>  
        </div>   

    </div>

</template>

<script>
// import { mapActions } from 'vuex'
export default {
    data(){
        return{
            modalShow: false,
            plateInModal: {},
        }
    },
    props:[
        'slug', 
        'formatCurrency',
        'restaurant_cart'
    ],
    computed:{
        totalPrice(){
            let cartTotalPrice = this.restaurant_cart.reduce( (acc, item) => {
                return acc + item.price * item.quantity
            }, 0) 
            return cartTotalPrice
        },
    },
   
    methods:{
        createOrderCart(restaurant_cart, slug){
            this.$store.dispatch({
                type: 'cartModule/createOrderCart',
                cart: restaurant_cart,
                slug: slug,
            })
        },

        goToOrder(){
            this.$router.push({name: 'order.create'})
        },

        modalShowToggle( plate ){
            this.modalShow = ! this.modalShow
            this.plateInModal = plate
        },        
        removeFromCart(plate){
            this.$store.dispatch({
                type: 'cartModule/removeFromCartStorage',
                plate: plate
            })

            this.modalShow = ! this.modalShow
        },
        increaseQuantity(plate){
            plate.quantity++
            
            this.updateQuantity(plate)

        },
        decreaseQuantity(plate){
            if(plate.quantity > 1){
                plate.quantity--
            }else{
                plate.quantity = 1
            }
            
            this.updateQuantity(plate)
        },
        updateQuantity( plate ){           
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
    #modal{
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;        
        background-color: rgb(128, 128, 128, 0.7);        
    }
</style>