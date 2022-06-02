<template>

    <div class="container" v-if="loading">
        <section class="flex">
            <figure class="max-w-sm">
                <img :src="restaurant.image">
            </figure>
            <div class="grow">
                <h1 class="font-bold text-4xl">{{restaurant.name}}</h1>
                <span v-for="category in restaurant.categories" :key="category.id" class="rounded-full bg-sky-500">{{category.name}}</span>
                <div>{{restaurant.city}}, {{restaurant.address}}</div>
            </div>
        </section>

        <section>
            <h1>Piatti</h1>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

                <div class="" v-for="plate in plates" :key="plate.id">
                    <div class="">
                        <p>{{plate.name}}</p>
                        <div>
                            <span>{{plate.price}}</span>
                        </div>  
                    </div>
                    <div class="">
                        <img :src="plate.image" alt="">
                    </div>
                </div>

            </div>
        </section>
    </div>

</template>

<script>
export default {
    data(){
        return {
            restaurant: null,
            plates: null,
            slug: this.$route.params.slug,
            loading: false,
        }
    },
    methods: {
        fetchRestaurant() {
            axios.get(`/api/restaurants/${this.slug}`)
                .then(res => {
                    /* this.restaurant = res.data */
                    const {restaurant, plates} = res.data;
                    this.restaurant = restaurant;
                    this.plates = plates;
                    this.loading = true;
                    console.log(res.data);
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