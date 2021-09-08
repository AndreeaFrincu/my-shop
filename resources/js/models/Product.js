import BaseModel from './BaseModel'

export default class Product extends BaseModel {

    resource() {
        return 'products'
    }
}
