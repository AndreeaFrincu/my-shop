<template>
    <div class="cart-table-row">
        <md-table-cell md-numeric>{{ product.id }}</md-table-cell>
        <md-table-cell>{{ product.product.title }}</md-table-cell>
        <md-table-cell>{{ product.quantity }}</md-table-cell>
        <md-table-cell>{{ product.product.currentPrice.price }}</md-table-cell>
        <md-table-cell>
            <md-button>
                <md-icon class="fa fa-minus-circle"></md-icon>
            </md-button>
        </md-table-cell>
        <md-table-cell>
            <md-button>
                <md-icon class="fa fa-plus-circle"></md-icon>
            </md-button>
        </md-table-cell>
        <md-table-cell>
            <md-button>
                <md-icon class="fa fa-trash"></md-icon>
            </md-button>
        </md-table-cell>
    </div>
</template>

<script>
export default {
    name: "CartTableRow",
    props: {
        product: {}
    }
}
</script>

<style scoped>

</style>
