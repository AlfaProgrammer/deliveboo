<template lang="">
    <main class="container">
        <h1 class="text-center text-6xl font-bold mb-10 text-deliveroo">Deliveboo</h1>

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
        }
    },
    components: {
        RestaurantCard,
    },
    methods: {
        fetchRestaurants() {
            axios.get('/api/restaurants')
                .then(res => {
                    const {restaurants} = res.data;
                    this.restaurants = restaurants;
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