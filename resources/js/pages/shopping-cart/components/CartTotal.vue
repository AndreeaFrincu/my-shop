<template>
    <md-card-content>
        <div id="cart-total">
            Total price: {{ getTotalPrice }}$
        </div>
    </md-card-content>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "CartTotal",
    computed: {
        ...mapGetters({
            getTotalPrice: 'cart/getTotalPrice'
        })
    }
}
</script>

<style scoped>

#cart-total {
    font-size: 20px;
    color: #2e7bff;
}

</style>
