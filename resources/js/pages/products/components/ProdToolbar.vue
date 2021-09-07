<template>
    <md-toolbar class="prod-toolbar">
        <div class="toolbar-menu">
            <span class="md-subheading">Products</span>

            <div class="sorting-menus">
                <prod-sort-by @sorting="onSortBySelected"></prod-sort-by>
                <prod-per-page @productsOnPage="onPageSelected"></prod-per-page>
            </div>
        </div>
    </md-toolbar>
</template>

<script>
import ProdSortBy from "./ProdSortBy";
import ProdPerPage from "./ProdPerPage";

export default {
    name: "ProdToolbar",
    components: {ProdPerPage, ProdSortBy},
    methods: {
        onSortBySelected(sortBy) {
            this.$store.commit('products/setSortBy', sortBy)
        },
        onPageSelected(perPage) {
            this.$store.commit('products/setPerPage', perPage)
        }
    },
    data: () => ({})
}
</script>

<style scoped>

.prod-toolbar {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.toolbar-menu {
    padding-top: 10px;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

p {
    color: gray;
}

</style>
