import axios from "axios";

export default{
    loadProducts({commit}) {
        axios.get('http://my-shop.valet/api/products')
            .then(response => {
                console.log(response.data)
                commit('setProducts', response.data)
            })
    },

    loadGenres({commit}) {
        axios.get('http://my-shop.valet/api/genres')
            .then(response => {
                commit('setGenres', response.data)
            })
    }
}
