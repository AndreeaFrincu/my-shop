import _ from "lodash";

export default {
    getCartProducts: state => {
        return state.cart.cartProducts
    },
    getDataForCartTable: state => {
        return state.tableData
    }
}
