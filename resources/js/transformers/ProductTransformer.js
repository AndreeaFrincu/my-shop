import apiTransformer from "./ApiTransformer";
import _ from 'lodash'

export default class productTransformer extends apiTransformer{
    static transformFromApiProduct(item) {
        return {
            "id":_.get(item, 'id', null),
            "genreId":_.get(item, 'genre_id', null),
            "authorId":_.get(item, 'author_id', null),
            "title":_.get(item, 'title', null),
            "currentPrice":_.get(item, 'currentPrice', null),
            "author":_.get(item, 'author', null),
            "genre":_.get(item, 'genre', null),
        }
    }

    static transformToApiProduct(item) {
        return item.replace( /([A-Z])/g, "_$1" ).toLowerCase();
    }
}
