<template>
    <div class="cart-product">
        <span>Product {{ product.title }}</span>
        <span>x {{ product.quantity }}</span>
        <span>{{ product.price }} $</span>
        <div class="cart-controls">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                  rel="stylesheet">

            <md-button class="md-icon-button md-list-action" @click="decreaseQuantity">
                <md-icon class="fa fa-minus-circle"></md-icon>
            </md-button>
            <md-button class="md-icon-button md-list-action" @click="increaseQuantity">
                <md-icon class="fa fa-plus-circle"></md-icon>
            </md-button>
            <md-dialog :md-active.sync="active"
                       :md-click-outside-to-close="false">
                <md-dialog-title>Are you sure you want to remove the item from your cart?</md-dialog-title>
                <p class="dialog-text">To proceed click YES</p>
                <md-dialog-actions>
                    <md-button class="md-primary" @click="onNo">No</md-button>
                    <md-button class="md-primary" @click="onYes">Yes</md-button>
                </md-dialog-actions>
            </md-dialog>

            <md-button class="md-icon-button md-list-action" @click="onYes">
                <md-icon class="fa fa-trash"></md-icon>
            </md-button>
        </div>
    </div>
</template>

<script>
import _ from "lodash";

export default {
    name: "CartProduct",
    data: () => ({
        active: false
    }),
    props: {
        product: {}
    },
    methods: {
        decreaseQuantity() {
            let cloneProduct = _.cloneDeep(this.product)
            const currentPrice = cloneProduct.price
            const initialPrice = cloneProduct.price / cloneProduct.quantity
            if (this.product.quantity > 1) {
                cloneProduct.quantity--
                cloneProduct.price = currentPrice - initialPrice
                this.$store.commit('cart/setItem', cloneProduct)
            } else {
                this.active = true
            }
        },
        increaseQuantity() {
            let cloneProduct = _.cloneDeep(this.product)
            const price = cloneProduct.price
            cloneProduct.quantity++
            cloneProduct.price = Math.floor(price / (cloneProduct.quantity - 1)) * cloneProduct.quantity
            this.$store.commit('cart/setItem', cloneProduct)
        },
        onYes() {
            this.$store.commit('cart/removeItem', this.product)
        },
        onNo() {
            this.active = false
        }
    }
}
</script>

<style scoped>

.cart-product {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

span {
    padding-top: 10px;
}

.dialog-text {
    display: flex;
    justify-content: center;
}

</style>
