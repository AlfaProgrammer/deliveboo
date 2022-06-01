<template>
    <div class="card p-5 rounded-lg">
        <img :src="restaurant.image" alt="">
        <h3>{{restaurant.name}}</h3>
        <p>{{restaurant.city}}</p>
    
        <div class="categories-wrapper">
            <span class="badge badge-pill badge-success m"
            v-for="category in restaurant.categories"
            :key="category.id">
    
                {{category.name}}
                
            </span>
        </div>
        <router-link :to="{name: 'restaurant.show', params: {slug:restaurant.slug}}" >Esplora</router-link>
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

<style>

</style>