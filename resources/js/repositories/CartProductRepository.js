import BaseRepository from "./BaseRepository"
import CartProduct from "../models/CartProduct"

export default class CartProductRepository extends BaseRepository {
    constructor() {
        super(CartProduct)
    }

    fetchCartProductsByUserId(value) {
        return CartProduct.custom(`cart_products?filter[cart.user_id]=${value}`).get()
    }

    fetchTable(currentPage, perPage) {
        return CartProduct.custom(`cart_products/table?filter[cart.user_id]=1&page=${currentPage}&limit=${perPage}`).get()
    }
}
