import CartRepository from "../../../repositories/CartRepository";
import Cart from "../../../models/Cart";
import {cartTransformer} from "../../../transformers/CartTransformer";
import _ from "lodash";
import {cartProductTransformer} from "../../../transformers/CartProductTransformer";
import productTransformer from "../../../transformers/ProductTransformer";
import currentPriceTransformer from "../../../transformers/CurrentPriceTransformer";
import authorTransformer from "../../../transformers/AuthorTransformer";
import genreTransformer from "../../../transformers/GenreTransformer";

export default {
    async loadCurrentUsersCart({commit}) {
        let cart = await new CartRepository(new Cart())
            .fetchOne(2)

        cart = cartTransformer.transformFromApiCart(cart)
        console.log(cart)

        commit('setUserId', cart)

        let cartTransformed = []

        _.forEach(cart.cartProducts, function (product) {
            product = cartProductTransformer.transformFromApiCartProduct(product)
            product.product = productTransformer.transformFromApiProduct(product.product)
            product.product.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(product.product.currentPrice)
            product.product.author = authorTransformer.transformFromApiAuthor(product.product.author)
            product.product.genre = genreTransformer.transformFromApiGenre(product.product.genre)

            cartTransformed.push(product)
        })

        console.log(cartTransformed)

        commit('setProducts', cartTransformed)
    }
}
