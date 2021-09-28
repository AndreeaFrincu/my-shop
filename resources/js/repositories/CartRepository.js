import BaseRepository from "./BaseRepository";
import Cart from "../models/Cart";

export default class CartRepository extends BaseRepository {
    constructor() {
        super(Cart);
    }
}
