<template>
    <div class="cart">
        <nav-bar></nav-bar>
        <cart-card></cart-card>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import CartCard from "./components/CartCard";

export default {
    name: "Cart",
    components: {CartCard, NavBar},
    mounted() {
        this.$store.dispatch('cart/fetchCart')
    }
}
</script>

<style scoped>

.cart {
    display: flex;
    flex-direction: column;
}

</style>
