import _ from "lodash";
import cartProductTransformer from "../../../transformers/CartProductTransformer";
import productTransformer from "../../../transformers/ProductTransformer";
import currentPriceTransformer from "../../../transformers/CurrentPriceTransformer";
import authorTransformer from "../../../transformers/AuthorTransformer";
import genreTransformer from "../../../transformers/GenreTransformer";
import cartTransformer from "../../../transformers/CartTransformer";
import CartProductRepository from "../../../repositories/CartProductRepository";
import CartProduct from "../../../models/CartProduct";
import {userTransformer} from "../../../transformers/UserTransformer";

export default {
    async loadCurrentUsersCart({commit, state}) {
        let cartProducts = await new CartProductRepository(new CartProduct())
            .fetchCartProductsByUserId(1)

        let cartTransformed = []

        _.forEach(cartProducts, function (product) {
            product = cartProductTransformer.transformFromApiCartProduct(product)
            product.product = productTransformer.transformFromApiProduct(product.product)
            product.product.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(product.product.currentPrice)
            product.product.author = authorTransformer.transformFromApiAuthor(product.product.author)
            product.product.genre = genreTransformer.transformFromApiGenre(product.product.genre)
            product.cart = cartTransformer.transformFromApiCart(product.cart)
            product.cart.user = userTransformer.transformFromApiAuthenticatedUser(product.product.genre)

            cartTransformed.push(product)
        })

        commit('setUserId', cartTransformed[0].cart)
        commit('setProducts', cartTransformed)

        let products = _.cloneDeep(cartTransformed)
        products = _.map(products, function (product) {
            commit('setProdLastId', 1)
            return {
                id: state.cartProdLastId,
                title: product.product.title,
                quantity: product.quantity,
                price: product.product.currentPrice.price,
            }
        })

        commit('setDataForCartTable', products)
    },

    async paginateCartTable({commit, state}) {
        let products = await new CartProductRepository(new CartProduct())
            .fetchTable(state.currentPage, state.perPage)

        console.log('before', products.data)

        let cartTransformed = []

        _.forEach(products.data, function (product) {
            product = cartProductTransformer.transformFromApiCartProduct(product)
            product.product = productTransformer.transformFromApiProduct(product.product)
            product.product.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(product.product.currentPrice)
            product.product.author = authorTransformer.transformFromApiAuthor(product.product.author)
            product.product.genre = genreTransformer.transformFromApiGenre(product.product.genre)
            product.cart = cartTransformer.transformFromApiCart(product.cart)
            product.cart.user = userTransformer.transformFromApiAuthenticatedUser(product.product.genre)

            cartTransformed.push(product)
        })

        commit('setUserId', cartTransformed[0].cart)
        commit('setProducts', cartTransformed)

        let productsTransformed = _.cloneDeep(cartTransformed)
        productsTransformed = _.map(productsTransformed, function (product) {
            commit('setProdLastId', 1)
            return {
                id: state.cartProdLastId,
                title: product.product.title,
                quantity: product.quantity,
                price: product.product.currentPrice.price,
            }
        })

        commit('setDataForCartTable', productsTransformed)
    }
}
