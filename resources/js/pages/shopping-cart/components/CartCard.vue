<template>
    <div class="cart-card-content">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
              rel="stylesheet">
        <md-card class="cart-card">
            <div class="top-cart">
                <cart-toolbar></cart-toolbar>

                <app-table :data="tableData">
                    <template slot="columns">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Decrease Quantity</th>
                        <th>Increase Quantity</th>
                        <th>Delete Product</th>
                    </template>

                    <template slot-scope="{ row }">
                        <td>{{ row.id }}</td>
                        <td>{{ row.title }}</td>
                        <td>{{ row.quantity }}</td>
                        <td>{{ row.price }}</td>
                        <td>
                            <md-button>
                                <md-icon class="fa fa-minus-circle"></md-icon>
                            </md-button>
                        </td>
                        <td>
                            <md-button>
                                <md-icon class="fa fa-plus-circle"></md-icon>
                            </md-button>
                        </td>
                        <td>
                            <md-button>
                                <md-icon class="fa fa-trash"></md-icon>
                            </md-button>
                        </td>
                    </template>
                </app-table>

                <app-paginator
                    :per-page="2"
                    :total-items="4"
                ></app-paginator>
            </div>

            <div class="bottom-cart">
<!--                <cart-total v-if="getTotalPrice>0"></cart-total>-->
<!--                <router-link id="link-products" to="/checkout">-->
<!--                    <md-button v-if="getTotalPrice>0" class="control-btn md-raised md-primary">Checkout</md-button>-->
<!--                </router-link>-->
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
import AppPaginator from "../../../components/AppPaginator";

export default {
    name: "CartCard",
    components: {AppTable, CartTotal, CartToolbar, AppPaginator},
    computed: {
        ...mapGetters({
            tableData: 'cart/getDataForCartTable',
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

.top-cart {
    width: 90%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding-bottom: 20px;
}

.cart-toolbar {
    width: 100%;
}

.bottom-cart {
    width: 90%;
    display: flex;
    justify-content: flex-end;
    flex-direction: row;
}

.control-btn {
    text-transform: capitalize;
    font-size: 17px;
}

</style>
