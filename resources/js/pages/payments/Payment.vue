<template lang="">
    <div>

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div class="container max-w-sm" v-if="loading">
            <div id="dropIn" class="" v-if="token">{{ dropIn() }}</div>
            <button class="rounded bg-deliveroo py-1 px-2 text-white font-bold"
            @click="confirmCta(inst)">
                Invia
            </button>    
        </div> 

    </div>
</template>
<script>
import CssLoaders from '../../components/CssLoaders.vue';

export default {
    data() {
        return {
            token: '',
            inst: null,
            loading: false,
            cart: [],
        }
    },
    components:{
        CssLoaders,
    },
    computed: {
        totalPirce() {
            const total = this.cart.reduce((acc,item)=>{
                return acc + item.price
            }, 0);

            return total;
        }
    },
    methods: {
        takeCart() {
            this.cart = JSON.parse(localStorage.getItem("cart"));
        },
        fetchToken() {
            axios.get('/api/payments')
            .then(res => {
                const {token} = res.data
                this.token = token;
                this.loading = true;
                console.log(token);
            })
        },
        sendToken(nonce) {
            axios.post('/api/payments',{
                total: this.totalPirce,
            }, {
                params: {
                    token: nonce,
                }
            })
            .then(res => {
                console.log(res.data);
            })
            .catch(err => {
                console.error(err);
            })
        },
        dropIn() {
            const dropIn = require('braintree-web-drop-in');
            dropIn.create({
                authorization: this.token,
                container: '#dropIn',
                locale: 'it_IT',
            }, (createErr, instance) => {
                 if (createErr) {
                    // An error in the create call is likely due to
                    // incorrect configuration values or network issues.
                    // An appropriate error will be shown in the UI.
                    
                    console.error(createErr);
                    return;
                }
                
                this.inst = instance;
                console.log(instance);
            });
        },
        confirmCta(instance) {
            instance.requestPaymentMethod((requestPaymentMethodErr, payload) => {
                if (requestPaymentMethodErr) {
                    // No payment method is available.
                    // An appropriate error will be shown in the UI.
                    console.error(requestPaymentMethodErr);
                    return;
                }

                this.sendToken(payload.nonce);
                //this.$router.push({ name: 'order.create' });
                console.log(payload.nonce);
            }
        )},
    },
    created() {
        this.fetchToken();
        this.takeCart();

    }
}
</script>
<style lang="scss">

</style>