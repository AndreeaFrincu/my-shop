<template>
    <div class="checkout">
        <nav-bar></nav-bar>
        <checkout-card></checkout-card>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import CheckoutCard from "./components/CheckoutCard";

export default {
    name: "Checkout",
    components: {NavBar, CheckoutCard},
}
</script>

<style scoped>

.checkout {
    display: flex;
    flex-direction: column;
}

</style>
