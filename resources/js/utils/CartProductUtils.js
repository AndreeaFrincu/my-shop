import _ from "lodash";
import {cartTransformer} from "../transformers/CartTransformer";
import {cartProductTransformer} from "../transformers/CartProductTransformer";
import productTransformer from "../transformers/ProductTransformer";
import currentPriceTransformer from "../transformers/CurrentPriceTransformer";

class CartProductUtils {

    static useTransformFromApiCartProdList(item) {
        item = cartTransformer.transformFromApiCart(item)
        _.forEach(item.cartProducts, function (product) {
            product = cartProductTransformer.transformFromApiCartProduct(product)
            product.product = productTransformer.transformFromApiProduct(product.product)
            product.product.currentPrice = currentPriceTransformer.transformFromApiCurrentPrice(product.product.currentPrice)
            // console.log(product)
        })
        // console.log(item)

        return item
    }
}

export default CartProductUtils
