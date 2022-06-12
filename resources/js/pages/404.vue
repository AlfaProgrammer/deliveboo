<template>
    <div class="wrapper-404 flex items-center justify-center bg-stone-300">
        <div class="not-found-card flex-col justify-center p-[20px] w-[50%] bg-deliveroo rounded-lg text-sm md:text-base">
            <p class="text-7xl text-white text-center mb-[10px]">404</p>
            <p class="text-white text-center font-bold">
                <i>
                    Spiacente, la pagina richesta non è stata trovata. <br>
                    Torna alla <router-link class="text-purple-900" :to="{name: 'restaurant.index'}"> home-page </router-link>
                    per continuare la navigazione
                </i> 
            </p>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

    .wrapper-404 {
        height: calc((100vh - 341px) - 62px);
        width: 100%;
    }

</style>