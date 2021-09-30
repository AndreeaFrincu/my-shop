import BaseModel from './BaseModel'

export default class Cart extends BaseModel {
    resource() {
        return 'carts'
    }
}
