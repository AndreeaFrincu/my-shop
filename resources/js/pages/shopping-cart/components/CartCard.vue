<template>
    <div class="cart-card-content">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
              rel="stylesheet">
        <md-card class="cart-card">
            <cart-toolbar></cart-toolbar>
            <div class="bottom-cart">

                <app-table :data="this.tableData" :columns="tableColumns"> </app-table>

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
import {mapGetters} from "vuex";
import CartToolbar from "./CartToolbar";
import CartTotal from "./CartTotal";
import AppTable from "../../../components/AppTable";

export default {
    name: "CartCard",
    components: {AppTable, CartTotal, CartToolbar},
    computed: {
        ...mapGetters({
            getTotalPrice: 'cart/getTotalPrice',
            tableData: 'cart/getCartProducts',
        })
    },
    data() {
        return {
            tableColumns: ["ID", "Title", "Quantity", "Price",
                "Decrease Quantity", "Increase Quantity", "Delete Product"]
        };
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
