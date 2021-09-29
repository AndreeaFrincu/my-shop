import _ from "lodash";
import apiTransformer from "./ApiTransformer";

export class cartProductTransformer extends apiTransformer {
    static transformFromApiCartProduct(item) {
        return {
            "id":_.get(item, 'id', null),
            "cartId":_.get(item, 'cart_id', null),
            "productId":_.get(item, 'product_id', null),
            "quantity":_.get(item, 'quantity', null),
            "product":_.get(item, 'product', null),
        }
    }
}
