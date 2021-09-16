import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/home/Home'
import Products from '../pages/products/Products'
import Cart from "../pages/shopping-cart/Cart";
import Checkout from "../pages/checkout/Checkout";
import Auth from "../pages/auth/Auth";

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            alias: '/auth',
            name: 'auth',
            component: Auth
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/products',
            name: 'products',
            component: Products
        },
        {
            path: '/cart',
            name: 'shopping-cart',
            component: Cart
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout
        }
    ]
})
