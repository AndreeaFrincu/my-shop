import apiTransformer from "./ApiTransformer";
import _ from 'lodash'

export default class genreTransformer extends apiTransformer{
    static transformFromApiGenre(item) {
        return {
            "id":_.get(item, 'id', null),
            "name":_.get(item, 'name', null),
        }
    }
}
