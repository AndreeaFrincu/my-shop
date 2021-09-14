import BaseRepository from './BaseRepository'
import ProductPrice from "../models/ProductPrice"

export default class ProductPriceRepository extends BaseRepository {
    constructor() {
        super(ProductPrice);
    }

    fetchProductByPrice(value) {
        return ProductPrice.custom(`product_prices?sort=${value}`).get()
    }
}
