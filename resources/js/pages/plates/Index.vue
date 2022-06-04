<template lang="">

    

    <main class="container">

        <div class="container-loader flex justify-center items-center" v-if="!loading">
            <CssLoaders/>
        </div>

        <div v-if="loading">
            <h1 class="text-center text-6xl font-bold mb-10 text-deliveroo">Deliveboo</h1>

        <div class="drop-down-menu mb-10">
            <button @click="setActive()" 
            :class="active ? 'bg-viola text-white' : 'text-deliveroo'"
            class="font-bold py-1 px-3 mb-3 border-2 border-viola rounded">
                Categorie
            </button>
            <div :class="['menu-item', active ? 'block' : 'hidden', 'bg-bgcheck/50', 'rounded-2xl']">
                <ul class="ks-cboxtags text-stone-500">
                    <li v-for="category in categories" :key="category.id">
                        <input type="checkbox" @change="check($event)" v-model="checkedCategories" :value="category.id" :id="category.name">   
                        <label :for="category.name">{{ category.name }}</label>
                    </li>
                </ul>
            </div>
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
            active: false,
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
        },
        setActive() {
            this.active = !this.active;
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

    .restaurant-card{
        transition: transform 350ms;
    }

    .restaurant-card:hover{
        transform: scale(1.1);
        transition: transform 150ms;
    }

    //** Checkboxstyle **/

    .drop-down-menu button {
        transition: all .3s ease-in-out;
    }

    .drop-down-menu div {
        animation: opacity .5s linear;
        box-shadow: 0px 15px 10px -10px rgba(127, 127, 127, 0.6);

    }

    .drop-down-menu li {
        transition: transform 250ms;
    }

    .drop-down-menu li:hover {
        transition: transform 250ms;
        transform: translateY(-6px);
    }

    @keyframes opacity {
        0% {opacity: 0;}
        50% {opacity: 0.5;}
        100% {opacity: 1;}
    }

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