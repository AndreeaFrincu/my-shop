import Product from "../../../models/Product";
import Genre from "../../../models/Genre";
import ProductRepository from "../../../repositories/ProductRepository";
import GenreRepository from "../../../repositories/GenreRepository";
import axios from "axios";

export default{
    async loadProducts({commit}) {
        // axios.get('http://my-shop.valet/api/products')
        //     .then(response => {
        //         commit('setProducts', response.data)
        //     })


        //const products = await new ProductRepository().fetchOne(1)
        const products = await new ProductRepository(new Product()).fetchAll()
        commit('setProducts', products)
    },

    async loadGenres({commit}) {
        // axios.get('http://my-shop.valet/api/genres')
        //     .then(response => {
        //         commit('setGenres', response.data)
        //     })

        //const genres = await new GenreRepository().fetchOne(2)
        const genres = await new GenreRepository(new Genre()).fetchAll()
        commit('setGenres', genres)
    }
}
