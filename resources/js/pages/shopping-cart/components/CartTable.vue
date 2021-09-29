<template>
    <div class="cart-table">
        <md-table
            md-card md-sort="name"
            md-sort-order="asc"
            v-model="paginatedProducts"
        >

            <md-table-row>
                <md-table-head>ID</md-table-head>
                <md-table-head>Title</md-table-head>
                <md-table-head>Quantity</md-table-head>
                <md-table-head>Price</md-table-head>
                <md-table-head>Decrease Quantity</md-table-head>
                <md-table-head>Increase Quantity</md-table-head>
                <md-table-head>Delete Product</md-table-head>
            </md-table-row>

            <md-table-row
                v-for="prod in cartProducts"
                :key="prod.id"
            >
                <md-table-cell>{{ prod.id }}</md-table-cell>
                <md-table-cell>{{ prod.product.title }}</md-table-cell>
                <md-table-cell>{{ prod.quantity }}</md-table-cell>
                <md-table-cell>{{ prod.product.currentPrice.price }}</md-table-cell>
                <md-table-cell>
                    <md-button>
                        <md-icon class="fa fa-minus-circle"></md-icon>
                    </md-button>
                </md-table-cell>
                <md-table-cell>
                    <md-button>
                        <md-icon class="fa fa-plus-circle"></md-icon>
                    </md-button>
                </md-table-cell>
                <md-table-cell>
                    <md-button>
                        <md-icon class="fa fa-trash"></md-icon>
                    </md-button>
                </md-table-cell>
            </md-table-row>


        </md-table>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "CartTable",
    components: {},
    data: () => ({
        paginatedProducts: [],
    }),
    methods: {
        updatePagination (page, pageSize, sort, sortOrder) {
            console.log('pagination has updated', page, pageSize, sort, sortOrder);
        }
    },
    computed: {
        ...mapGetters({
            cartProducts: 'cart/getCartProducts',
        })
    }
}
</script>

<style scoped>

</style>
