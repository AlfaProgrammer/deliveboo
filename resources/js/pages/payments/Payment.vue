<template lang="">
    <div>
        <div id="dropIn" v-if="this.token">{{ dropIn() }}</div>
        <button @click="confirmCta(inst)">Invia</button>

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
            instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                if (requestPaymentMethodErr) {
                    // No payment method is available.
                    // An appropriate error will be shown in the UI.
                    console.error(requestPaymentMethodErr);
                    return;
                }

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