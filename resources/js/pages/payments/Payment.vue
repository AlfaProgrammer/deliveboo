<template lang="">
    <div>
        <v-braintree
        :autorization="token">

        </v-braintree>
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
                console.log(token);
            })
        }
    },
    created() {
        this.fetchToken();
    }
}
</script>
<style lang="scss">
    
</style>