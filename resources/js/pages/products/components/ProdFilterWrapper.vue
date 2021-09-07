<template>
    <div class="prod-filter-wrapper-content">
        <md-card>
            <div class="left-side">
                <genres-filter></genres-filter>
                <prod-filters></prod-filters>
            </div>
            <prod-wrapper></prod-wrapper>
        </md-card>
    </div>
</template>

<script>
import ProdWrapper from "./ProdWrapper";
import GenresFilter from "./GenreFilterList";
import ProdFilters from "./ProdFilters";

export default {
    name: "ProdFilterWrapper",
    components: {ProdFilters, GenresFilter, ProdWrapper}
}
</script>


<style scoped>

.prod-filter-wrapper-content {
    /*padding-top: 60px;*/
}

.md-card {
    display: flex;
    flex-direction: row;
    margin: 30px 100px;
}

.left-side {
    display: flex;
    flex-direction: column;
    width: 20%;
}

</style>
