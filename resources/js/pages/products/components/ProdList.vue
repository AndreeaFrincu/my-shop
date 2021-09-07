<template>
    <div class="prod-list">
        <product
            v-for="prod in getProducts"
            id="product" :key="prod.id" :product="prod"
            @input="onProductAdded"></product>
    </div>
</template>

<script>
import _ from 'lodash'
import {mapGetters} from "vuex";
import Product from "./Product";

export default {
    name: "ProdList",
    components: {Product},
    computed: {
        ...mapGetters({
            getProducts: 'products/getProductsPaginated'
        })
    },
    methods: {
        /** When 'Add to cart' is clicked */
        onProductAdded(product) {
            let prodList = _.cloneDeep(this.$store.state.cart.itemsList)
            let index = prodList.length
            let currentPrice = product.price
            const initialPrice = product.price / product.quantity

            /** If the product is already in the cart (list of items in the store),
             * increase quantity and price */
            if (prodList.some(prod => prod.id === product.id)) {
                prodList[product.cartPosition].quantity++
                currentPrice = initialPrice * prodList[product.cartPosition].quantity
                prodList[product.cartPosition].price = currentPrice
            }
            /** If the product is not in the cart, add it (in the list of items) */
            else {
                product.cartPosition = index
                prodList.push(product)
            }
            /** Update the list of items in store */
            this.$store.commit('cart/setItems', prodList)
        }
    }
}
</script>

<style scoped>

.prod-list {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    flex-wrap: wrap;
    align-items: stretch;
}

#product {
    width: 200px;
    height: 200px;
    margin: 20px 20px 0 20px;
    align-items: center;
    display: flex;
}

</style>
