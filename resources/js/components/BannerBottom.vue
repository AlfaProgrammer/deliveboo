<template>
    <div>

        <section id="banner-bottom-wrap" class="grid grid-cols-2 mt-6">
            <div class="banner-bottom-1"></div>
            <div class="banner-bottom-2"></div>
        </section>

    </div>
</template>

<script>

export default {
    
}
</script>

<style lang="scss" scoped>
    
     #banner-bottom-wrap {
        min-height: 300px;
        background-color: #4d0067;

        .banner-bottom-1 {
            background-image: url('/img/deliveroo-wall-01.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .banner-bottom-2 {
            background-image: url('/img/deliveroo-wall-03.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

    }

</style>