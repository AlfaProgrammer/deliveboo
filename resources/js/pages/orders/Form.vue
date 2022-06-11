<template>
    <div>
        <div class="order-summary container">
            <h1 class="text-xl font-bold"> Stai Ordinando da <span class="text-deliveroo">{{cartOnOrder.cartRestauratReference}}</span> </h1>
            <p>Il totale del tuo ordine sarà di: <span class="font-bold text-deliveroo"> {{cartOnOrder.cartTotalPrice}} euro</span> </p>
        </div>
        <ValidationObserver v-slot="{ handleSubmit }">

            <form @submit.prevent="handleSubmit(onSubmit)" methods="post">
                <div class="container shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="text-xs italic mb-5">
                            <p>I campi contrassegnati con * sono richiesti</p>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <validationProvider name="nome" rules="required|alpha_spaces|max:30" v-slot="{ errors }">
                                    <label for="name" class="after:content-['*'] block text-sm font-medium text-gray-700">Nome</label>
                                    <input type="text" v-model="form.name" name="name" id="name" autocomplete="given-name "  
                                    class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md"
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <validationProvider name="cognome" rules="required|alpha_spaces|max:50" v-slot="{ errors }">
                                    <label for="surname" class="after:content-['*'] block text-sm font-medium text-gray-700">Cognome</label>
                                    <input type="text" v-model="form.surname" name="surname" id="surname" autocomplete="surname" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                                
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <validationProvider name="email" rules="required|email|max:50" v-slot="{ errors }">
                                    <label for="email" class="after:content-['*'] block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" v-model="form.email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <validationProvider name="telefono" rules="required|numeric|min:10|max:20" v-slot="{ errors }">
                                    <label for="phone_number" class="after:content-['*'] block text-sm font-medium text-gray-700">Telefono</label>
                                    <input type="text" v-model="form.phone_number" name="phone_number" autocomplete="phone_number" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md "
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6">
                                <validationProvider name="indirizzo" rules="required|max:80|alpha_spaces" v-slot="{ errors }">
                                    <label for="address" class="after:content-['*'] block text-sm font-medium text-gray-700">Indirizzo / Via</label>
                                    <input type="text" v-model="form.address" name="address" id="address" autocomplete="address" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <validationProvider name="civico" rules="required|max:10" v-slot="{ errors }">
                                    <label for="house_number" class="after:content-['*'] block text-sm font-medium text-gray-700">N. civico</label>
                                    <input type="text" v-model="form.house_number" name="house_number" id="house_number" autocomplete="house_number" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <validationProvider name="città" rules="required|alpha_spaces|max:30" v-slot="{ errors }">
                                    <label for="city" class="after:content-['*'] block text-sm font-medium text-gray-700">Città</label>
                                    <input type="text" v-model="form.city" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <validationProvider name="cap" rules="required|numeric|max:5" v-slot="{ errors }">
                                    <label for="cap" class="after:content-['*'] block text-sm font-medium text-gray-700">ZIP / CAP</label>
                                    <input type="text" v-model="form.cap" name="cap" id="cap" autocomplete="cap" class="mt-1 focus:ring-viola focus:border-viola block w-full shadow-sm sm:text-sm border-deliveroo rounded-md" 
                                    :class="errors.length ? 'border-2 border-red-500 focus:border-red-500' : ''"/>
                                    <div class="text-sm text-red-500 font-bold italic py-1 px-2">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button  type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-deliveroo hover:bg-viola focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-viola">
                            Invia
                        </button>
                    </div>
                </div>
            </form>

        </ValidationObserver>

    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    data() {
        return {
            form: {
                name: '',
                surname: '',
                email: '',
                phone_number: '',
                address: '',
                house_number: '',
                city: '',
                cap: '',
            },
            cart: [],
        }
    },
    computed: {
        totalPirce() {
            const total = this.cart.reduce((acc,item)=>{
                return acc + item.price
            }, 0);

            return total;
        }
    },
    methods: {
        takeCart() {
            this.cart = JSON.parse(localStorage.getItem("cart"));
        },
        submitForm() {
            axios.post('/api/orders', {
                form: this.form,
                total: this.totalPirce,
                cart: this.cart,
                //localStorage.getItem('totalPrice'),
            })
            .then(res => {
                console.log(res.data);
                const {order} = res.data;
                localStorage.order = JSON.stringify(order);
                this.$router.push({name: 'payments.index'});
            })
            .catch(error => {
                console.log(error);
            })
        },
        onSubmit() {
            this.submitForm();
            console.log(this.form);
        },
    },
    created() {
        this.takeCart();
    },
    computed:mapState('cartModule',[
        'cartOnOrder',
    ])
    
}
</script>

<style lang="scss" scoped>
    
</style>