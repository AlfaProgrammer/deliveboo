<template lang="">
    <div>
        <div class="container max-w-sm">
            <div id="dropIn" class="" v-if="token">{{ dropIn() }}</div>
            <button class="rounded bg-deliveroo py-1 px-2 text-white font-bold"
            @click="confirmCta(inst)">
                Invia
            </button>    
        </div> 
    </div>
</template>
<script>
export default {
    data() {
        return {
            token: '',
            inst: null,
        }
    },
    methods: {
        fetchToken() {
            axios.get('/api/payments')
            .then(res => {
                const {token} = res.data
                this.token = token;
                console.log(token);
            })
        },
        sendToken(nonce) {
            axios.post('/api/payments',null, {
                params: {
                    token: nonce,
                }
            })
            .then(res => {
                console.log(res);
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
                console.log(payload.nonce);
            }
        )},
    },
    created() {
        this.fetchToken();  
    },
}
</script>
<style lang="scss">

</style>