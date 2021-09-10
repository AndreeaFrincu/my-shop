import BaseRepository from './BaseRepository'
import Product from "../models/Product";

export default class ProductRepository extends BaseRepository {
    constructor() {
        super(Product);
    }

    fetchProductsByTitle(value) {
        return Product.custom(`products?sort=${value}`).get()
    }

    fetchProductByGenre(value) {
        return Product.custom(`products?filter[genre.name]=${genre}`).get()
    }
}
