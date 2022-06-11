<template>
    <div>
        <section v-if="!order" class="flex items-center justify-center">
            <loader />
        </section>

        <section v-else class="py-16 px-4 bkg-order-show">
            <div class="container flex justify-center items-center">

                <div class="card rounded shadow-lg shadow-stone-700 p-7 bg-stone-100">
                    <div class="border-b-2 border-b-deliveroo rounded-sm py-1.5 px-2.5 text-center">
                        <h1 class="text-viola font-bold text-2xl mb-2">
                            Il tuo ordine è avvenuto con successo
                        </h1>
                        <h4 class="text-sm text-stone-700">Presto riceverai una mail di conferma Ordine</h4>
                    </div>
                    <div class="border-b-2 border-b-deliveroo rounded-sm py-1.5 px-2.5">
                        <h2 class="text-viola font-bold text-lg">Dati spedizione:</h2>
                        <ol class="font-medium">
                            <li class="flex items-center gap-3">
                                <h4 class="text-stone-700">Numero spedizione:</h4>
                                <span class="grow text-right">{{order.id}}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <h4 class="text-stone-700">Destinatario:</h4>
                                <span class="grow text-right">{{ order.name + ' ' + order.surname }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <h4 class="text-stone-700">Indirizzo:</h4>
                                <span class="grow text-right">{{ order.address + ' ' + order.house_number }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <h4 class="text-stone-700">CIttà:</h4>
                                <span class="grow text-right">{{ order.city }}</span>
                            </li>
                        </ol>
                    </div>
                        
                    <div class="border-b-2 border-b-deliveroo rounded-sm py-1.5 px-2.5">
                        <h2 class="text-viola font-bold text-lg">Articoli:</h2>
                        <ol class="font-medium">
                            <li v-for="plate in cart" :key="plate.id"
                            class="flex items-center justify-between gap-3">
                                <h4 class="text-stone-700 font-medium basis-[40%]">{{ plate.name }}</h4>                                
                                <span class="ml-[15px] basis-[30%]">quantità: {{plate.quantity}}</span>
                                <span class="text-right basis-[40%]">{{ formatCurrency( (plate.price*plate.quantity) ) }}</span>                                
                            </li>
                        </ol>
                    </div>

                    <div class="border-b-2 border-b-deliveroo rounded-sm flex items-center gap-3 py-1.5 px-2.5 mb-4">
                        <h2 class="text-viola font-bold text-lg">Totale Ordine:</h2>
                        <h4 class="grow text-right font-medium">{{ formatCurrency(order.total_price) }}</h4>
                    </div>

                    <div class=" py-1.5 px-2.5 text-center">
                        <button class="rounded bg-viola py-1 px-3 text-white font-bold"
                        @click="deleteOrderFromStorage()">
                            Home
                        </button>
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>
<script>
import loader from '../../components/CssLoaders.vue';

export default {
    components: {
        loader,
    },
    data() {
        return {
            cart: [],
            order: {},
        }
    },
    methods: {
        takeCart() {
            this.cart = JSON.parse(localStorage.getItem("cart"));
        },
        takeOrder() {
            this.order = JSON.parse(localStorage.getItem("order"));
        },
        deleteOrderFromStorage() {
            localStorage.removeItem('order');
            this.$router.push({ name: 'restaurant.index' });
        },
        formatCurrency( price ){
            return (price.toLocaleString('it-IT', { style: 'currency', currency: 'EUR'}))
        },
    },
    created() {
        this.takeCart();
        this.takeOrder();
    }
    
}
</script>

<style lang="scss" scoped>

    .bkg-order-show {
        height: calc((100vh - 62px) - 341px);
        background-image: url('/images/wave4.svg');
        background-position: center;
        background-size: 1660px;
        background-repeat: no-repeat;
    }

    .card {
        flex-basis: 720px;

    }

</style>