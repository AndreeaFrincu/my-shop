<template>
    <md-menu class="sort-prod" md-align-trigger md-size="medium">
        <md-button class="sort-prod-btn" md-menu-trigger>
            Sort By
        </md-button>

        <md-menu-content>
            <md-menu-item v-for="sortItem in sortList"
                          :key="sortItem.id"
                          @click="sortProduct(sortItem)">{{ sortItem.name }}
            </md-menu-item>
        </md-menu-content>
    </md-menu>
</template>

<script>
export default {
    name: "ProdSortBy",
    data: () => ({
        sortList: [
            {
                id: 1,
                name: 'None',
                value: null
            },
            {
                id: 2,
                name: 'Price (Ascending)',
                value: 'price'
            },
            {
                id: 3,
                name: 'Price (Descending)',
                value: '-price'
            },
            {
                id: 4,
                name: 'Alphabetic (Ascending)',
                value: 'title'
            },
            {
                id: 5,
                name: 'Alphabetic (Descending)',
                value: '-title'
            }
        ],
        sortBy: null
    }),
    methods: {
        sortProduct(sortItem) {
            this.sortBy = sortItem.value
            this.$emit("sorting", this.sortBy)
        }
    }
}
</script>

<style scoped>

.sort-prod-btn {
    text-transform: capitalize;
}

</style>
