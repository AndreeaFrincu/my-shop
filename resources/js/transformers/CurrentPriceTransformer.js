import apiTransformer from "./ApiTransformer";
import _ from 'lodash'

export default class currentPriceTransformer extends apiTransformer{
    static transformFromApiCurrentPrice(item) {
        return {
            "id":_.get(item, 'id', null),
            "productId":_.get(item, 'product_id', null),
            "price":_.get(item, 'price', null),
            "startDate":_.get(item, 'start_date', null),
            "endDate":_.get(item, 'end_date', null),
        }
    }
}
