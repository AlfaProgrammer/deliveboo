<template>

    <div class="back-img">
        <router-view></router-view>
    </div>

</template>

// -----------------------------------------------------------------
// JS

<script>
export default {
    
}
</script>

// -----------------------------------------------------------------
// CSS

<style lang="scss">

    .back-img {
        background: linear-gradient(175deg, rgb(0, 204, 188) 50%, rgb(208, 235, 153) 50%);
        height: 456px;
    }

    img {
        width: 100%;
        display: block;
    }

    body {
        background: #fff;
        color: #000;
    }

    .container-loader {
        height: calc(100vh - 86px);
    }
    
</style>