<template>
    <div>

        <section id="banner" class="grid grid-cols-1 md:grid-cols-2">
            <div class="banner-1"></div>
            <div class="banner-2 md:flex items-center justify-center hidden ">
                <h1 class="text-6xl text-viola font-bold">
                    Deliveboo
                </h1>
            </div>
        </section>
        
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang="scss" scoped>

    #banner {
        min-height: 300px;
        background-color: #00cdbe;

        .banner-1 {
            background-image: url('/img/deliveroo-wall-02.png');
            background-size: 550px;
            background-position: center;
            background-repeat: no-repeat;
        }

    }

    @media screen and (max-width: 390px) {
        #banner .banner-1 {
            background-size: 390px;
        }
    }

    @media screen and (max-width: 870px) {
        #banner .banner-1 {
            background-size: 450px;
        }
    }
    
</style>