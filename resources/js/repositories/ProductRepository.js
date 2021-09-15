import BaseRepository from './BaseRepository'
import Product from "../models/Product"

export default class ProductRepository extends BaseRepository {
    constructor() {
        super(Product);
    }

    fetchProductsByTitle(value) {
        return Product.custom(`products?sort=${value}`).get()
    }

    fetchProductsByPrice(value) {
        return Product.custom(`products?sort=${value}`).get()
    }

    fetchProductByGenre(genreIds) {
        return Product.custom(`products?filter[genre_id]=${genreIds}`).get()
    }

    fetchTable(currentPage, perPage){
        if(perPage === 'Default') {
            perPage = '';
        }
        return Product.custom(`products/table?page=${currentPage}&limit=${perPage}`).get()
    }
}
