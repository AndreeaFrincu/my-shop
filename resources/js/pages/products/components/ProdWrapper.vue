<template>
    <div class="prod-wrapper">
        <prod-toolbar></prod-toolbar>
        <prod-list></prod-list>
        <app-paginator
            v-model="currentPage"
            :per-page="perPage"
            :total-items="totalItems"
        ></app-paginator>
    </div>
</template>

<script>
import AppPaginator from "../../../components/AppPaginator";
import ProdToolbar from "./ProdToolbar";
import ProdList from "./ProdList";

export default {
    name: "ProdWrapper",
    components: {ProdToolbar, AppPaginator, ProdList},
    computed: {
        currentPage: {
            get() {
                return this.$store.state.products.currentPage
            },
            set(value) {
                this.$store.commit('products/setCurrentPage', value)
            }
        },
        perPage: {
            get() {
                return this.$store.state.products.perPage
            },
            set(value) {
                this.$store.commit('products/setPerPage', value)
            }
        },
        totalItems() {
            return this.$store.getters['products/getTotalProducts'].length
        }
    }
}


</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Material+Icons");

.prod-wrapper {
    display: flex;
    flex-direction: column;
    padding: 20px;
    width: 80%;
}

</style>
