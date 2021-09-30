<template>
    <div class="prod-wrapper">
        <prod-toolbar></prod-toolbar>
        <prod-list></prod-list>
        <app-paginator
            v-model="currentPage"
            :per-page="perPage"
            :total-items="totalItems"
            :click-handler="changePage"
            :page-count="totalPages"
            :first-item="firstItem"
            :last-item="lastItem"
        ></app-paginator>
    </div>
</template>

<script>
import AppPaginator from "../../../components/AppPaginator";
import ProdToolbar from "./ProdToolbar";
import ProdList from "./ProdList";
import {mapGetters} from "vuex";

export default {
    name: "ProdWrapper",
    components: {ProdToolbar, AppPaginator, ProdList},
    computed: {
        ...mapGetters({
            getCurrentPage: 'products/getCurrentPage',
            getPerPage: 'products/getPerPage',
            getTotalProducts: 'products/getTotalProducts',
        }),

        currentPage: {
            get() {
                return this.getCurrentPage
            },
            set(value) {
                this.$store.commit('products/setCurrentPage', value)
            }
        },
        perPage: {
            get() {
                return this.getPerPage
            },
            set(value) {
                this.$store.commit('products/setPerPage', value)
            }
        },
        totalItems() {
            return this.getTotalProducts.length
        },
        totalPages() {
            let pageSize = (this.perPage > 0) ? this.perPage : this.totalItems
            let result = Math.floor(this.totalItems / pageSize)
            return (this.totalItems % pageSize !== 0) ? result + 1 : result
        },
        firstItem() {
            return this.perPage * this.getCurrentPage - (this.perPage - 1)
        },
        lastItem() {
            return this.perPage * this.getCurrentPage
        },
    },
    methods: {
        changePage() {
            // console.log(currentPage)
            // this.$emit('input', currentPage)
            this.$store.dispatch('products/sendPerPage');
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
