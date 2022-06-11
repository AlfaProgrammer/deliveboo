<template>

    <div>
        <router-view></router-view>
        <Footer />
    </div> 

</template>

// -----------------------------------------------------------------
// JS

<script>
import Footer from '../components/FooterGuest.vue';

export default {
    name: 'App',
    components: {
        Footer,
    }
}
</script>

// -----------------------------------------------------------------
// CSS

<style lang="scss">

    // .back-img {
    //     background: linear-gradient(175deg, rgb(0, 204, 188) 50%, rgb(208, 235, 153) 50%);
    //     height: 456px;
    // }

    img {
        width: 100%;
        display: block;
        // border: 1px solid red;
    }

    body {
        background: #fff;
        color: #000;
    }

    .container-loader {
        height: calc(100vh - 86px);
    }
    
</style>