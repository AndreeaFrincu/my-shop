import Vue from 'vue'
import Vuex from 'vuex'
import products from '../pages/products/store'
import cart from '../pages/shopping-cart/store'
import checkout from '../pages/checkout/store'
import auth from '../pages/auth/store'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        products: products,
        cart: cart,
        checkout: checkout,
        auth: auth
    }
})
