import Product from "../../../models/Product";
import Genre from "../../../models/Genre";
import ProductRepository from "../../../repositories/ProductRepository";
import GenreRepository from "../../../repositories/GenreRepository";
import state from "./state";
import axios from "axios";

export default{
    async loadProducts({commit}) {
        //const products = await new ProductRepository().fetchOne(1)
        const products = await new ProductRepository(new Product())
            .fetchAll()
        // console.log(products)
        commit('setProducts', products)
    },

    async loadGenres({commit}) {
        //const genres = await new GenreRepository().fetchOne(2)
        const genres = await new GenreRepository(new Genre())
            .fetchAll()
        // console.log(genres)
        commit('setGenres', genres)
    },

    async sortProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchProductsByTitle(state.sortBy)
        commit('setProducts', products)
    },

    async filterProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchProductByGenre(state.selectedGenreList
                .map(obj => obj.id).toString())

        commit('setProducts', products)
    },

    async paginateProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchTable()

        console.log(products)
        commit('setProducts', products)
    },

    // async sendPerPage() {
    //     const posts = await Product.page(1).limit(20).get()
    // }
}
