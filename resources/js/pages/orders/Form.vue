<template lang="">
    <div>
        <form @submit.prevent="submitForm">

            <div class="container shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="text-xs italic mb-5">
                        <p>I campi contrassegnati con * sono richiesti</p>
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="after:content-['*'] block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" v-model="form.name" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <div v-if="">

                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="surname" class="after:content-['*'] block text-sm font-medium text-gray-700">Cognome</label>
                            <input type="text" v-model="form.surname" name="surname" id="surname" autocomplete="surname" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <div v-if="">
                                
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="after:content-['*'] block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" v-model="form.email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="phone_number" class="after:content-['*'] block text-sm font-medium text-gray-700">Telefono</label>
                            <input type="text" v-model="form.phone_number" name="phone_number" autocomplete="phone_number" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6">
                            <label for="address" class="after:content-['*'] block text-sm font-medium text-gray-700">Indirizzo / Via</label>
                            <input type="text" v-model="form.address" name="address" id="address" autocomplete="address" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="house_number" class="after:content-['*'] block text-sm font-medium text-gray-700">N. civico</label>
                            <input type="text" v-model="form.house_number" name="house_number" id="house_number" autocomplete="house_number" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="after:content-['*'] block text-sm font-medium text-gray-700">Città</label>
                            <input type="text" v-model="form.city" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="cap" class="after:content-['*'] block text-sm font-medium text-gray-700">ZIP / CAP</label>
                            <input type="text" v-model="form.cap" name="cap" id="cap" autocomplete="cap" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button :disabled="isDisable"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-deliveroo hover:bg-viola focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-viola">
                        Invia
                    </button>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null,
                surname: null,
                email: null,
                phone_number: null,
                address: null,
                house_number: null,
                city: null,
                cap: null,
            },
            isDisable: true,
        }
    },
    methods: {
        submitForm() {
            axios.post('/api/orders', {
                form: this.form,
            })
            .then(res => {
                console.log(res);
            })
        },
    },
    
}
</script>

<style lang="scss" scoped>
    
</style>