import CartRepository from "../../../repositories/CartRepository";
import Cart from "../../../models/Cart";

export default {
    async loadCurrentUsersCart({commit}) {
        const cart = await new CartRepository(new Cart())
            .fetchOne(1)

        console.log(cart)
        commit('setCart', cart)
    }
}
