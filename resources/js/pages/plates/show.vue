<template>

    <div class="container" v-if="loading">
        <header class="flex">
            <div>
                <img :src="restaurant.image" alt="">
            </div>
            <div>
                <h1>{{restaurant.name}}</h1>
                <span v-for="category in restaurant.categories" :key="category.id" class="rounded-full bg-sky-500">{{category.name}}</span>
                <div>{{restaurant.city}}, {{restaurant.address}}</div>
            </div>
        </header>

        <main>
            <h1 class="">Piatti</h1>
            <div class="my-32 grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

                <div class="p-3 flex" v-for="plate in plates"  :key="plate.id">
                    <div class="p-3 flex" v-if="plate.available">

                        <div class="basis-2/3">
                            <p>{{plate.name}}</p>
                            <div><span>{{plate.price}}</span></div>  
                        </div>
                        <div class="basis-1/3 border border-gray-300">
                            <img :src="plate.image" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </main>
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