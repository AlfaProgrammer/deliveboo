<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss">
    img{
        width: 100%;
        display: block;
    }
    body{
        background: #fff;
        color: #000;
    }

    .container-loader{
        height: calc(100vh - 86px);
    }
    
</style>