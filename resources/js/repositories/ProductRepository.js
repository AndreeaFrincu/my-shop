import BaseRepository from './BaseRepository'
import Product from "../models/Product";

export default class ProductRepository extends BaseRepository {
    constructor() {
        super(Product);
    }

    fetchProductsByTitle(value) {
        return Product.custom(`products?sort=${value}`).get()
    }

    fetchProductByGenre(genreIds) {
        return Product.custom(`products?filter[genre_id]=${genreIds}`).get()
    }

    // fetchProductsPaginated() {
    //     return Product.custom(`products/table?page=1&limit=3`).get()
    // }
}
