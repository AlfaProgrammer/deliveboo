<template>

    <div class="cart_container max-w-xl">

        <div v-if="restaurant_cart.length < 1 ">
            <div class="rounded shadow-lg shadow-stone-700 p-5 bg-[#f5f5f5] min-h-[150px]">
                <h1 class="font-bold text-viola mb-3 uppercase">Il tuo carrello è vuoto</h1>
                <h4 class="font-semibold">
                    Ricordati che puoi acquistare da un ristorante per volta.
                </h4> 
            </div> 
        </div>        
            
        <div v-else class=" flex">

            <div class="totalPrice p-4 rounded shadow-lg shadow-stone-600">

                <ul v-for="(plate, index) in restaurant_cart" :key="index">
                    <li class="grid grid-cols-3 p-[20px] shadow-lg gap-3">

                        <figure class="col-span-1 rounded-sm overflow-hidden">
                            <img class="object-cover aspect-square" :src="plate.image">
                        </figure>

                        <div id="plate-state" class="text-center col-span-2 sm:col-span-1 lg:col-span-2 xl:col-span-1 flex flex-col justify-center sm:justify-start items-center gap-y-4">
                            <p class="mb-3">
                                <span class="font-semibold">Quantità:</span> {{plate.quantity}}
                            </p>
                            <button class="rounded-full bg-viola text-white font-semibold py-1 px-3 text-sm"
                            @click="modalShowToggle(plate)">
                                Rimuovi
                            </button>
                        </div>

                        <div class="item-info col-span-3 sm:col-span-1 lg:col-span-3 xl:col-span-1 flex items-center justify-evenly sm:flex-col sm:justify-center sm:items-start lg:flex-row lg:justify-start xl:flex-col gap-y-3 gap-x-1">
                            <h3><span class="font-semibold">Articolo:</span> {{ plate.name }}</h3>
                            <p>
                                <span class="font-semibold">Prezzo:</span> {{formatCurrency(plate.price)}}
                            </p>

                            <div class="quantity-wrapper flex gap-2 justify-center self-center"> 
                                <button  @click="decreaseQuantity(plate)" class="font-bold">-</button>
                                <div class="font-bold quantity-text">{{plate.quantity}}</div>
                                <button  @click="increaseQuantity(plate)" class="font-bold">+</button>
                            </div>
                        </div>
                    
                    </li>
                </ul> 

                <div class="flex items-center justify-evenly">
                    <div class="totalPrice font-bold">
                        <p>Totale: {{formatCurrency(totalPrice)}}</p>
                    </div>
                    <!-- <router-link :to="{name: 'order.create'}" @click="console.log('ciao')" class="bg-sky-500/100 text-white rounded-lg px-[15px] pointer">
                        Ordina Ora
                    </router-link>   -->
                    <button 
                        class="bg-viola text-white rounded-lg px-[15px] font-semibold"   
                        @click="createOrderCart(restaurant_cart, slug), goToOrder()"                 
                    >
                        Ordina Ora
                    </button>           
                </div>

            </div>
        </div>   

         <!-- MODALE CONFERMA RIMOZIONE dal CARRELLO -->
        <div id="modal" class="flex items-center justify-center" :class="[modalShow ? '': 'hidden']">
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

    .totalPrice {
        background-color: #F5F5F5;
        margin: 15px 0;
        max-width: -moz-available;
    }

    .quantity-text {
        color: rgb(14 165 233 / 1);
    }
</style>