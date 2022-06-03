<template lang="">

    

    <main class="container">

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div v-if="loading">
            <h1 class="text-center text-6xl font-bold mb-10 text-deliveroo">Deliveboo</h1>
    
            <div class="grid restaurant-wrap gap-6">
                <RestaurantCard
                    v-for="restaurant in restaurants"
                    :key="restaurant.id"
                    :restaurant="restaurant"
                />
            </div>
        </div>

    </main>
</template>

<script>
import RestaurantCard from '../../components/RestaurantCard.vue';
import CssLoaders from '../../components/CssLoaders.vue';

export default {
    data() {
        return {
            restaurants: [],
            loading: false,
        }
    },
    components: {
        RestaurantCard,
        CssLoaders,
    },
    methods: {
        fetchRestaurants() {
            axios.get('/api/restaurants')
                .then(res => {
                    const {restaurants} = res.data;
                    this.restaurants = restaurants;
                    this.loading = true;
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

    .restaurant-card:hover{
        transform: scale(1.1);
        transition: 0.3s;
    }
    
    
</style>