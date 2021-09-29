import apiTransformer from "./ApiTransformer";
import _ from 'lodash'

export default class authorTransformer extends apiTransformer{
    static transformFromApiAuthor(item) {
        return {
            "id":_.get(item, 'id', null),
            "name":_.get(item, 'name', null),
        }
    }
}
