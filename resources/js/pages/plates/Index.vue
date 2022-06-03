<template lang="">
    <main class="container">
        <h1 class="text-center text-6xl font-bold mb-10 text-deliveroo">Deliveboo</h1>

        <nav class="flex flex-wrap items-center gap-3 mb-5">
            <ol class="contents">
                <li>
                    <a href="">Home</a>
                </li>
                <li v-for="category in categories " :key="category.id"
                @click="fetchFilters(category.id)"
                class="whitespace-nowrap">
                    {{ category.name }}
                </li>
            </ol>
        </nav>

        <div class="grid restaurant-wrap gap-6">
            <RestaurantCard
                v-for="restaurant in restaurants"
                :key="restaurant.id"
                :restaurant="restaurant"    
            />
        </div>

    </main>
</template>

<script>
import RestaurantCard from '../../components/RestaurantCard.vue';

export default {
    data() {
        return {
            restaurants: [],
            categories: [],
        }
    },
    components: {
        RestaurantCard,
    },
    methods: {
        fetchRestaurants() {
            axios.get('/api/restaurants')
                .then(res => {
                    const {restaurants, categories} = res.data;
                    this.restaurants = restaurants;
                    this.categories = categories;
                })
        },
        fetchFilters(category) {
            axios.get('/api/restaurants', {
                params: {
                    category: category,
                }
            })
            .then(res => {
                const {restaurant} = res.data
                this.restaurants = null;
                this.restaurants = restaurant;
                //console.log(restaurant);
            })
        }
    },
    beforeMount() {
        this.fetchRestaurants()
    }
}
</script>

<style lang="scss" scoped>

    .restaurant-wrap {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    }
    
</style>