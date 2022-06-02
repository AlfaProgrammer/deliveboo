<template>
    <section class="">

        <div class="container" v-if="loading">

            <nav class="mb-6 font-bold">
                <router-link :to="{name: 'restaurant.index'}" class="text-stone-700 border border-deliveroo hover:text-white hover:bg-deliveroo px-2 py-1 rounded">
                    Ristoranti
                </router-link>
            </nav>

            <div class="flex gap-3 mb-5">
                <figure class="max-w-lg rounded-lg overflow-hidden">
                    <img :src="restaurant.image" class="restaurant-cover">
                </figure>
                <div class="grow">
                    <h1 class="font-bold text-4xl mb-3">{{restaurant.name}}</h1>
                    <div class="flex items-center gap-2">
                        <span v-for="category in restaurant.categories" :key="category.id" 
                        class="rounded-full bg-deliveroo mb-2 px-2 text-white font-bold">
                            {{category.name}}
                        </span>
                    </div>
                    <div>
                        {{restaurant.city}} - {{restaurant.address}}
                    </div>
                </div>
            </div>

            <div>
                <h1 class="font-bold text-xl mb-5">Piatti</h1>

                <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                    <div class="flex gap-3 bg-stone-100 p-4 rounded shadow-lg shadow-stone-300 hover:scale-110 hover:cursor-pointer" 
                    v-for="plate in plates" :key="plate.id">
                        <div class="grow">
                            <p class="font-bold mb-3">{{plate.name}}</p>
                            <div>
                                <span>{{plate.price}} €</span>
                            </div>  
                        </div>
                        <figure class="max-w-[80px] rounded-sm">
                            <img class="object-cover" :src="plate.image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

<style lang="scss" scoped>

    img {
        aspect-ratio: 1;
    }

    .restaurant-cover {
        aspect-ratio: 16/9;
    }

</style>