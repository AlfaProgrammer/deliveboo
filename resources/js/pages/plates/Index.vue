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
        <div>
            <ul>
                <li v-for="category in categories" ::key="category.id">
                    <input type="checkbox" @change="check($event)" v-model="checkedCategories" :value="category.id" :id="category.name">   
                    <label :for="category.name">{{ category.name }}</label>
                </li>
            </ul>
        </div>

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
import CssLoaders from '../../components/CssLoaders.vue';

export default {
    data() {
        return {
            restaurants: [],
            loading: false,
            categories: [],
            active: false,
            checkedCategories: [],
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
                    const {restaurants, categories} = res.data;
                    this.restaurants = restaurants;
                    this.loading = true;
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
                this.restaurants = restaurant;
                //console.log(restaurant);
            });
        },
        check(event) {
            if(event.target.checked) {
                this.fetchFilters(this.checkedCategories)
            } else if(this.checkedCategories == '') {
                this.fetchRestaurants();
            } else {
                this.fetchFilters(this.checkedCategories);
            }
        }
    },
    beforeMount() {
        this.fetchRestaurants();
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