<template>
    <div class="flex items-center justify-center w-screen h-screen bg-stone-300">
        <div class="not-found-card flex-col justify-center p-[20px] w-[50%] bg-deliveroo rounded-lg">
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

<style>

</style>