import _ from "lodash";

export default {
    setProducts(state, value) {
        state.cart.cartProducts = value
    },
    setUserId(state, value) {
        state.cart.userId = value.userId
    },
    setDataForCartTable(state, value) {
        state.tableData = value
    },
    setProdLastId(state, value) {
        state.cartProdLastId += value
    },

    setItems(state, value) {
        //set on store with value
        state.itemsList = value
    },
    setItem(state, value) {
        _.forEach(state.itemsList, (element) => {
            if (element.id === value.id) {
                element.quantity = value.quantity
                element.price = value.price
            }
        })
    },
    removeItem(state, value) {
        let cloneList = _.cloneDeep(state.itemsList)
        _.remove(cloneList, function (element) {
            return element.id === value.id;
        });
        state.itemsList = cloneList
    },
    setBadge(state, value) {

    }
}
