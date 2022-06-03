<template>
    <div class="rounded overflow-hidden bg-stone-100 border border-stone-200 shadow-lg shadow-stone-400 hover:cursor-pointer restaurant-card">
        <router-link :to="{name: 'restaurant.show', params: {slug:restaurant.slug}}" >

            <figure class="mb-3">
                <img :src="restaurant.image" class="object-cover object-center">
            </figure>
            <div class="px-2 mb-2">
                <h3>{{restaurant.name}}</h3>
            </div>
            <div class="flex items-center gap-2 px-2 mb-2">
                <span class="rounded-full bg-deliveroo px-3 text-white font-bold"
                v-for="category in restaurant.categories" :key="category.id">
                    {{category.name}}
                </span>
            </div>

        </router-link>
    </div> 
</template>

<script>
export default {
    name: 'RestaurantCard',
    props: {
        restaurant: Object,
        require: true,
    }
}
</script>

<style lang="scss" scoped>

    img {
        aspect-ratio: 16/9;
    }

</style>