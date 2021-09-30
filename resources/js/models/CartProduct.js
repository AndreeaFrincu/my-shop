import BaseModel from './BaseModel'

export default class CartProduct extends BaseModel {
    resource() {
        return 'cart_products'
    }
}
