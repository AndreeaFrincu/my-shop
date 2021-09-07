<template>
    <md-menu class="sort-prod" md-align-trigger md-size="medium">
        <md-button class="sort-prod-btn" md-menu-trigger>
            On the page
        </md-button>

        <md-menu-content>
            <md-menu-item v-for="pageNumber in onPageSortList"
                          :key="pageNumber.id"
                          @click="pageProducts(pageNumber)">{{ pageNumber.name }}
            </md-menu-item>
        </md-menu-content>
    </md-menu>
</template>

<script>
export default {
    name: "ProdPerPage",
    data: () => ({
        onPageSortList: [
            {
                id: 1,
                name: 'All products',
                value: null
            },
            {
                id: 2,
                name: '1',
                value: 1
            },
            {
                id: 3,
                name: '2',
                value: 2
            },
            {
                id: 4,
                name: '3',
                value: 3
            }
        ],
    }),
    methods: {
        pageProducts(pageNumber) {
            if (pageNumber.value === null) {
                pageNumber.value = this.$store.getters['products/getProducts'].length
            }
            this.$emit('productsOnPage', pageNumber.value)
            this.$store.commit('products/setCurrentPage', 1)
        }
    }
}
</script>

<style scoped>

.sort-prod-btn {
    text-transform: capitalize;
}

</style>
