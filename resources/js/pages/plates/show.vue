<template>

    <div class="container d-flex" v-if="loading">
        <div>
            <img :src="restaurant.image" alt="">
        </div>
        <div class="bg-sky-500">
            <h1>{{restaurant.name}}</h1>
            <span></span>
        </div>
        <div class="grid grid-cols-4 gap-3">
            <div v-for="n in 5" :key="n" class="font-bold">{{ n }}</div>
        </div>
    </div>

</template>

<script>
export default {
    data(){
        return {
            restaurant: null,
            slug: this.$route.params.slug,
            loading: false,
        }
    },
    methods: {
        fetchRestaurant() {
            axios.get(`/api/restaurants/${this.slug}`)
                .then(res => {
                    /* this.restaurant = res.data */
                    const {restaurant} = res.data;
                    this.restaurant = restaurant;
                    console.log(this.restaurant);
                    this.loading = true;
                })
                /* .catch(err => {
                    this.router.push('/404');
                }) */
        }
    },
    beforeMount() {
        this.fetchRestaurant()
    }
}
</script>

<style>

</style>