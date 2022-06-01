<template lang="">
    <main class="container">
        <div class="card-wrapper">
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
    .card-wrapper{
        display: flex;
        align-items: center;
        gap: 30px;
        justify-content: center;
        flex-wrap: wrap;

        .card{
            width: 300px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            .categories-wrapper{
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
    }
</style>