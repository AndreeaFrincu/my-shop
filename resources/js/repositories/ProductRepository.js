import BaseRepository from './BaseRepository'
import Product from "../models/Product"

export default class ProductRepository extends BaseRepository {
    constructor() {
        super(Product);
    }

    fetchAllProducts() {
        return Product.custom(`products?filter[current_price]=true`).get()
    }

    fetchProductsByTitle(value) {
        return Product.custom(`products?filter[current_price]=true&sort=${value}`).get()
    }

    fetchProductsByPrice(value) {
        return Product.custom(`products?filter[current_price]=true&sort=${value}`).get()
    }

    fetchProductByGenre(genreIds) {
        return Product.custom(`products?filter[current_price]=true&filter[genre_id]=${genreIds}`).get()
    }

    fetchTable(currentPage, perPage){
        return Product.custom(`products/table?filter[current_price]=true&page=${currentPage}&limit=${perPage}`).get()
    }
}
