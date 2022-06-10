<template lang="">
    <div>
        <div class="container">
            <div class="">
                <div>
                    <h1>Il tuo ordine è avvenuto con successo</h1>
                    <div>
                        
                    </div>
                </div>
                
                <div>
                    <ol>
                        <li v-for="plate in cart" :key="plate.id">
                            {{plate.name}}
                            {{plate.price}}
                        </li>
                    </ol>
                </div>

                <div>
                    <button>Home</button>
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
    
</style>