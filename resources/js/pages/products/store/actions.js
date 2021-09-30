import Product from "../../../models/Product";
import Genre from "../../../models/Genre";
import ProductRepository from "../../../repositories/ProductRepository";
import GenreRepository from "../../../repositories/GenreRepository";
import _ from "lodash";
import productTransformer from "../../../transformers/ProductTransformer";
import genreTransformer from "../../../transformers/GenreTransformer";
import authorTransformer from "../../../transformers/AuthorTransformer";
import currentPriceTransformer from "../../../transformers/CurrentPriceTransformer";

export default{
    async loadProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchAllProducts()

        /** To find out how many products I have in total
         * For pagination */
        commit('setTotalProducts', products)

        let transformedProducts = []

        _.forEach(products, function (prod) {
            prod = productTransformer.transformFromApiProduct(prod)
            prod.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(prod.currentPrice)
            prod.genre = genreTransformer.transformFromApiGenre(prod.genre)
            prod.author = authorTransformer.transformFromApiAuthor(prod.author)
            transformedProducts.push(prod)
        })

        commit('setProducts', transformedProducts)


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

            let transformedProducts = []

            _.forEach(products, function (prod) {
                prod = productTransformer.transformFromApiProduct(prod)
                prod.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(prod.currentPrice)
                prod.genre = genreTransformer.transformFromApiGenre(prod.genre)
                prod.author = authorTransformer.transformFromApiAuthor(prod.author)
                transformedProducts.push(prod)
            })

            commit('setProducts', transformedProducts)
        }
        else if(state.sortBy.includes('price')){
            const products = await new ProductRepository(new Product())
                .fetchProductsByPrice(state.sortBy)

            let transformedProducts = []

            _.forEach(products, function (prod) {
                prod = productTransformer.transformFromApiProduct(prod)
                prod.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(prod.currentPrice)
                prod.genre = genreTransformer.transformFromApiGenre(prod.genre)
                prod.author = authorTransformer.transformFromApiAuthor(prod.author)
                transformedProducts.push(prod)
            })

            commit('setProducts', transformedProducts)
        }


    },

    async filterProducts({commit}) {
        const products = await new ProductRepository(new Product())
            .fetchProductByGenre(state.selectedGenreList
                .map(obj => obj.id).toString())

        let transformedProducts = []

        _.forEach(products, function (prod) {
            prod = productTransformer.transformFromApiProduct(prod)
            prod.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(prod.currentPrice)
            prod.genre = genreTransformer.transformFromApiGenre(prod.genre)
            prod.author = authorTransformer.transformFromApiAuthor(prod.author)
            transformedProducts.push(prod)
        })

        commit('setProducts', transformedProducts)
    },

    async sendPerPage({commit, state}) {
        let products
        if (state.perPage <= 3) {
            products = await new ProductRepository(new Product())
                .fetchTable(state.currentPage, state.perPage)

            commit('setProducts', products.data)
        }
        else {
            products = await new ProductRepository(new Product())
                .fetchAllProducts()
            console.log('no pagination')

            /** To find out how many products I have in total
             * For pagination */
            commit('setTotalProducts', products)
            commit('setProducts', products)

            /** Initial perPage = all products */
            commit('setPerPage', products.length)
        }
    },

}
