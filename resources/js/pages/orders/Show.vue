<template lang="">
    <div>
        <div class="container wrapper flex flex-col justify-center items-center">

            <div class="rounded shadow-lg shadow-stone-300 p-7">
                <div class="border-b-2 border-b-deliveroo rounded-sm">
                    <h1>Il tuo ordine è avvenuto con successo</h1>
                    <h3>Presto riceverai una mail di conferma Ordine</h3>
                </div>
                <div class="border-b-2 border-b-deliveroo rounded-sm">
                    <ol>
                        <li>
                            <h4>Numero spedizione:</h4>
                            {{order.id}}
                        </li>
                        <li>
                            <h4>Destinatario:</h4>
                            {{ order.name + ' ' + order.surname }}
                        </li>
                        <li>
                            <h4>Indirizzo:</h4>
                            {{ order.address + order.house_number }}
                        </li>
                        <li>
                            <h4>CIttà</h4>
                            {{ order.city }}
                        </li>
                    </ol>
                </div>
                
                <div class="border-b-2 border-b-deliveroo rounded-sm">
                    <ol class="content">
                        <li v-for="plate in cart" :key="plate.id">
                            {{ plate.name }}
                            {{ plate.price }}
                        </li>
                    </ol>
                </div>

                <div>
                    <router-link tag="button" :to="{ name: 'restaurant.index' }"
                    class="rounded bg-viola py-1 px-2 text-white font-bold">
                        Home
                    </router-link>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
export default {

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
        }
    },
    created() {
        this.takeCart();
        this.takeOrder();
    }
    
}
</script>
<style lang="scss" scoped>

    .container.wrapper {
        height: calc(100vh - 62px - 12px - 341px);
    }

</style>