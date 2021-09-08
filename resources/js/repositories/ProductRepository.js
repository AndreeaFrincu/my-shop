import BaseRepository from './BaseRepository'
import Product from "../models/Product";

export default class ProductRepository extends BaseRepository {
    constructor() {
        super(Product);
    }
}
