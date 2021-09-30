import _ from "lodash";
import apiTransformer from "./ApiTransformer";

export default class cartTransformer extends apiTransformer {
    static transformFromApiCart(item) {
        return {
            "id":_.get(item, 'id', null),
            "userId":_.get(item, 'user_id', null),
            "user":_.get(item, 'user', null),
        }
    }
}
