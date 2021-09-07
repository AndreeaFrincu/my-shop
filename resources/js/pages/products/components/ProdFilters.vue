<template>
    <div class="filtered-by">
        <md-divider v-if="this.$store.state.products.sortBy !== null"
                    class="divider"></md-divider>
        <div class="sort-by-chips">
            <p v-if="this.$store.state.products.sortBy !== null" id="sort-by-title">Sorted by</p>
            <p>{{ sortedBy }}</p>
        </div>

        <md-divider v-if="getSelectedGenres.length>0"
                    class="divider"></md-divider>
        <div class="genre-chip-menu">
            <p v-if="getSelectedGenres.length>0" id="filters-title">Filtered by</p>
            <div class="genre-chip-wrapper">
                <prod-chips
                    v-for="genre in getSelectedGenres"
                    v-if="getSelectedGenres.length>0"
                    :key="genre.id"
                    :genre="genre"></prod-chips>
            </div>
        </div>
    </div>
</template>

<script>
import ProdChips from "./ProdChips";
import {mapGetters} from "vuex";

export default {
    name: "ProdFilters",
    components: {ProdChips},
    computed: {
        ...mapGetters({
            getSelectedGenres: 'products/getSelectedGenreName'
        }),
        sortedBy() {
            let sortedByInfo = this.$store.state.products.sortBy
            let sortedByText = ' '
            let asc = ' (Ascending)'
            let des = ' (Descending)'
            if (sortedByInfo) {
                if (sortedByInfo[0] === '+') {
                    sortedByText = sortedByInfo.split('+')
                    sortedByText = (sortedByText[1].charAt(0).toUpperCase()) + sortedByText[1].slice(1).concat(asc)
                } else if (sortedByInfo[0] === '-') {
                    sortedByText = sortedByInfo.split('-')
                    sortedByText = (sortedByText[1].charAt(0).toUpperCase()) + sortedByText[1].slice(1).concat(des)
                }
            }
            return sortedByText
        }
    },
    methods: {}
}
</script>

<style scoped>

.filtered-by {
    padding-bottom: 10px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    margin: 0 0 0 20px;
}

.divider {
    margin: 10px 0 10px 0;
    width: 80%;
}

.genre-chip-menu {
    width: 50%;
    display: flex;
    flex-direction: column;
}

#filters-title, #sort-by-title {
    color: gray;
}

/*.genre-chip-wrapper {*/
/*  display: flex;*/
/*  flex-direction: row;*/
/*}*/

.genre-chip {
    margin: 3px;
}

</style>
