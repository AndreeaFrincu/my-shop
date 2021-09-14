import Product from "../../../models/Product";
import Genre from "../../../models/Genre";
import ProductRepository from "../../../repositories/ProductRepository";
import GenreRepository from "../../../repositories/GenreRepository";
import state from "./state";

export default{
    async loadProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchAll()

        /** To find out how many products I have in total
         * For pagination */
        commit('setTotalProducts', products)
        commit('setProducts', products)

        /** Initial perPage = all products */
        commit('setPerPage', products.length)
    },

    async loadGenres({commit}) {
        const genres = await new GenreRepository(new Genre())
            .fetchAll()

        commit('setGenres', genres)
    },

    async sortProducts({commit}) {
        if(state.sortBy.includes('title')) {
            const products = await new ProductRepository(new Product())
                .fetchProductsByTitle(state.sortBy)

            commit('setProducts', products)
        }
        else if(state.sortBy.includes('price')){

        }
    },

    async filterProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchProductByGenre(state.selectedGenreList
                .map(obj => obj.id).toString())

        commit('setProducts', products)
    },

    async sendPerPage({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchTable(state.currentPage, state.perPage)

        commit('setProducts', products.data)
    }
}
