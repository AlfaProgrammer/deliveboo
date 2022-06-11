<template>
    <div class="payment-wrapper justify-center flex items-center py-3 px-4">

        <div v-if="!loading">
            <CssLoaders/>
        </div>

        <div class="container max-w-sm" v-if="loading">
            <div id="dropIn" class="drop-shadow-xl dropin" v-if="token">
                {{ dropIn() }}
            </div>

            <div>
                <button class="rounded bg-viola py-1 px-3 text-white font-bold"
                @click="confirmCta(inst)">
                    Invia
                </button>    
            </div>
        </div>

    </div>
</template>
<script>
import CssLoaders from '../../components/CssLoaders.vue';
import {mapState} from 'vuex';
export default {
    data() {
        return {
            token: '',
            inst: null,
            loading: false,
        }
    },
    components:{
        CssLoaders,
    },
    computed: {
        ...mapState('cartModule', ['cartOnOrder']),
    },
    methods: {
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
                total: this.cartOnOrder.cartTotalPrice,
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
                this.$router.push({ name: 'orders.show' });
                console.log(payload.nonce);
            }
        )},
    },
    created() {
        this.fetchToken();
    }
}
</script>

<style lang="scss" scoped>

    .payment-wrapper {
        height: calc((100vh - 62px) - 341px);
        background-image: url('/images/wave00.svg');
        background-position: center;
        background-size: 1080px;
        background-repeat: no-repeat;

        .dropin {
            filter: drop-shadow(2px 4px 8px #57534e);
        }
    }
        
</style>