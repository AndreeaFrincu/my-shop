import apiTransformer from "./ApiTransformer";

export default class productTransformer extends apiTransformer{
    static transformFromApi(item) {
        return {
            "id":_.get(item, 'id', null)
        }
    }

    // static transformToApi(item) {
    //     return {
    //         "id":_.get(item, 'id', null)
    //     }
    // }

    static transformToApi(item) {
        return item.replace( /([A-Z])/g, "_$1" ).toLowerCase();
    }
}
