<template lang="">
    <div>
        <div id="dropIn" v-if="this.token">{{ dropIn() }}</div>
        <button>Invia</button>

    </div>
</template>
<script>
export default {
    data() {
        return {
            token: '',
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
            }, function(createErr, instance){
                 if (createErr) {
                    // An error in the create call is likely due to
                    // incorrect configuration values or network issues.
                    // An appropriate error will be shown in the UI.
                    console.error(createErr);
                    return;
                }
            });
        }
    },
    created() {
        this.fetchToken();  
    },

}
</script>
<style lang="scss">
    
</style>