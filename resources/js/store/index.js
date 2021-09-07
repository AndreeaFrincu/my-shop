import Vue from 'vue'
import Vuex from 'vuex'
import products from '../pages/products/store/store'
import cart from '../pages/shopping-cart/store/store'
import checkout from '../pages/checkout/store'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        products: products,
        cart: cart,
        checkout: checkout
    }
})
