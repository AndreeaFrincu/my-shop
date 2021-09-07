<template>
    <md-card-content class="card-content">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <div class="cart-list-content">
            <cart-product v-for="prod in getItems" v-if="checkEmptyCart > 0" id="cart-product" :key="prod.id"
                          :product="prod"></cart-product>
            <md-empty-state v-if="checkEmptyCart === 0"
                            class="md-accent"
                            md-description="You have nothing in your cart yet.
        Click on 'Continue Shopping' to add items."
                            md-icon="sentiment_dissatisfied"
                            md-label="Empty"
                            md-rounded>
            </md-empty-state>
        </div>
    </md-card-content>
</template>

<script>
import {mapGetters} from "vuex";
import CartProduct from "./CartProduct";

export default {
    name: "CartList",
    components: {CartProduct},
    computed: {
        ...mapGetters({
            getItems: 'cart/getItems'
        }),
        checkEmptyCart: function () {
            return this.getItems.length
        }
    }
}
</script>

<style scoped>

.card-content {
    height: 80%;
}

.cart-list-content {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    overflow-y: auto;
}

.cart-list-content::-webkit-scrollbar {
    width: 1em;
}

.cart-list-content::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.cart-list-content::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
}

.cart-text {
    display: flex;
    justify-content: center;
}

</style>
