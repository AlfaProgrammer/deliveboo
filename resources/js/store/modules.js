export const cartModule = {
    namespaced:  true,

    state: {
        plates: [],
        cart: ['item1', 'item2', 'item3'],
        orders: [],
        // slug: this.$route.params.slug,


    },
    mutations: {
        cartFill(plate){

        }
    },
    actions: {
        fetchPlates( store, payload ) {

            // console.log(payload.slug)
            
            axios.get(`/api/restaurants/${payload.slug}`)
                .then( res => {
                    console.log(res.data.plates)
                })

            //         // const { plates } = res.data;
            //         // this.restaurant = restaurant;
            //         // this.plates = plates;
            //         // console.log(this.restaurant);
            //         // this.loading = true;
            //         // console.log(res.data);
            //     })
                /* .catch(err => {
                    this.router.push('/404');
                }) */
        }
    },

    getters:{
        // non li utilizziamo perche useremo la funzione helper mapState per il momento
        // se dovessimo fare dei calcoli prima di restituire una proprieta in state, utilizzeremo i getter.
    }
}