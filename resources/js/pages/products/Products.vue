<template>
    <div class="products-page-content">
        <nav-bar></nav-bar>
        <prod-filter-wrapper></prod-filter-wrapper>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import {mapGetters} from "vuex";
import ProdFilterWrapper from "./components/ProdFilterWrapper";

export default {
    name: "Products",
    components: {ProdFilterWrapper, NavBar},
    mounted() {
        this.$store.dispatch('products/loadProducts')
        this.$store.dispatch('products/loadGenres')
    }
}
</script>

<style scoped>

.products-page-content {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

</style>
