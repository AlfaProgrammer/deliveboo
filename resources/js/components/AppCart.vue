<template>
  <div>
      <p>carrello</p>
      <p v-for="(item, index) in cart" :key="index"> {{ item }} </p>
      <p>{{slug}}</p>
      <button @click="fetchPlates()"> Cliccami </button>
  </div>
</template>

<script>
import {mapState, mapActions} from 'vuex';
export default {
    props:[
        'slug'  // ho bisogno dello slug da passare alla chiamata in store.js 
    ],
    computed: {
        // fatto minding del path al modulo cartModule per recuperare l'árray cart
        ...mapState('cartModule', ['cart']),

    },
    methods:{
        fetchPlates(){
            this.$store.dispatch({
                type: 'cartModule/fetchPlates',
                slug: this.slug
            })
        }
        
    }
}
</script>

<style>

</style>