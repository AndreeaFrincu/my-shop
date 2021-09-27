import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Home from '../pages/home/Home'
import Products from '../pages/products/Products'
import Cart from "../pages/shopping-cart/Cart"
import Checkout from "../pages/checkout/Checkout"
import Auth from "../pages/auth/Auth"
import Profile from "../pages/profile/Profile"
import AuthError from "../pages/auth/AuthError";
import store from '../store/index'

Vue.use(Router)
Vue.use(Meta)

const router = createRouter()
export default router

function createRouter() {
    const router = new Router({
        mode: 'history',
        base: '',
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
            },
            {
                path: '/profile',
                name: 'profile',
                component: Profile,
            },
            {
                path: '/auth_err',
                name: 'auth_err',
                component: AuthError
            },
        ]
    })

    return router
}
