<template>
    <div>Ciao</div>
</template>

<script>
export default {
    data(){
        return {
            restaurant: null,
            slug: this.$route.params.slug,
            loading: true,
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
                    this.loading = false;
                })
                /* .catch(err => {
                    this.router.push('/404');
                }) */
        }
    },
    mounted() {
        this.fetchRestaurant()
    }
}
</script>

<style>

</style>