<template>
    <div class="cart-card-content">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
              rel="stylesheet">
        <md-card class="cart-card">
            <cart-toolbar></cart-toolbar>
            <cart-list></cart-list>
            <div class="bottom-cart">
                <cart-total v-if="getTotalPrice>0"></cart-total>
                <router-link id="link-products" to="/checkout">
                    <md-button v-if="getTotalPrice>0" class="control-btn md-raised md-primary">Checkout</md-button>
                </router-link>
                <router-link id="link-products" to="/products">
                    <md-button id="continue-sh" class="control-btn md-raised md-primary">Continue Shopping</md-button>
                </router-link>
            </div>
        </md-card>
    </div>
</template>

<script>
import CartList from "./CartList";
import CartToolbar from "./CartToolbar";
import CartTotal from "./CartTotal";
import {mapGetters} from "vuex";

export default {
    name: "CartCard",
    components: {CartTotal, CartToolbar, CartList},
    computed: {
        ...mapGetters({
            getTotalPrice: 'cart/getTotalPrice'
        })
    }
}
</script>

<style scoped>

.cart-card-content {
    display: flex;
    flex-direction: column;
    width: 90%;
    align-self: center;
    margin-top: 20px;
}

.cart-card {
    height: 600px;
    display: flex;
    align-items: center;
    flex-direction: column;
}

.md-card-content {
    width: 97%;
}

.bottom-cart {
    width: 90%;
    display: flex;
    justify-content: flex-end;
    flex-direction: row;
    padding-bottom: 20px;
}

.control-btn {
    text-transform: capitalize;
    font-size: 17px;
}

</style>
