<template lang="">
    <div>
        ciao questo giusto
    </div>
</template>

<script>
export default {
    data() {
        return {
            restaurants: [],
        }
    },
    methods: {
        fetchRestaurant() {
            axios.get('/api/restaurants')
                .then(res => {
                    const {restaurants} = res.data;
                    this.restaurants = restaurants;
                    console.log(this.restaurants);
                })
        }
    },
    beforeMount() {
        this.fetchRestaurant()
    }
}
</script>

<style lang="">
    
</style>