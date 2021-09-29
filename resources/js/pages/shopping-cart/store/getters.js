import _ from "lodash";

export default {
    getCartProducts: state => {
        return state.cart.cartProducts
    },
    getItems: state => {
        return _.cloneDeep(state.itemsList)
    },
    getTotalPrice: state => {
        let totalPrice = 0
        let listOfItems = _.cloneDeep(state.itemsList)
        _.forEach(listOfItems, (element) => {
            totalPrice += element.price
        })
        return totalPrice
    }
}
