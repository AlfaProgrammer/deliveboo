<template>
    <div>
        <section v-if="!order">
            <loader />
        </section>

        <section v-else class="my-14">
            <div class="container flex justify-center items-center">

                <div class="card rounded shadow-lg shadow-stone-300 p-7">
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
                            class="flex items-center gap-3">
                                <h4 class="text-stone-700 font-medium">{{ plate.name }}</h4>
                                <span class="grow text-right">{{ plate.price }}&euro;</span>
                            </li>
                        </ol>
                    </div>

                    <div class="border-b-2 border-b-deliveroo rounded-sm flex items-center gap-3 py-1.5 px-2.5 mb-4">
                        <h2 class="text-viola font-bold text-lg">Totale Ordine:</h2>
                        <h4 class="grow text-right font-medium">{{ order.total_price }}&euro;</h4>
                    </div>

                    <div class=" py-1.5 px-2.5 text-center">
                        <button class="rounded bg-viola py-2.5 px-5 text-white font-bold"
                        @click="deleteOrderFromStorage()">
                            Home
                        </button>
                        <!-- <router-link tag="button" :to="{ name: 'restaurant.index' }"
                        class="rounded bg-viola py-2.5 px-5 text-white font-bold">
                            Home
                        </router-link> -->
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
        }
    },
    created() {
        this.takeCart();
        this.takeOrder();
    }
    
}
</script>
<style lang="scss" scoped>

    .card {
        flex-basis: 620px;
    }

</style>