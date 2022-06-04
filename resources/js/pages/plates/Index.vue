<template lang="">

    

    <main class="container">

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div v-if="loading">
            <h1 class="text-center text-6xl font-bold mb-10 text-deliveroo">Deliveboo</h1>

            <div>
                <ul class="ks-cboxtags text-stone-500">
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

    //** Checkboxstyle **/

    ul.ks-cboxtags {
        list-style: none;
        padding: 20px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 5px;
    }

    ul.ks-cboxtags li label {
        display: flex;
        align-items: center;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid rgba(139, 139, 139, .3);
        border-radius: 25px;
        white-space: nowrap;
        margin: 3px 0px;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
    }

    ul.ks-cboxtags li label {
        padding: 8px 12px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font-weight: 900;
        font-size: 12px;
        padding: 2px 6px 2px 2px;
        content: "\292B";
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
        content: "\2713";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label {
        border: 2px solid #440063;
        background-color: #00CCBC;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        display: absolute;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
    }

    ul.ks-cboxtags li input[type="checkbox"]:focus + label {
        border: 2px solid rgba(68, 0, 99, 0.6);
    }
    
</style>