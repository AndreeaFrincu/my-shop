<template>
    <div class="prod">
        <md-content class="md-primary product-content">
            <span id="prod-title">{{ product.title }}</span>
            <md-button class="md-raised add-btn" @click="addProdToCart">
                Add to cart
            </md-button>
        </md-content>
    </div>
</template>

<script>
export default {
    name: "Product",
    props: {
        product: {}
    },
    methods: {
        addProdToCart() {
            this.$emit("input", this.product)
        }
    }
}
</script>

<style scoped>

.prod {
    justify-content: flex-end;
}

.md-content {
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-items: center;
}

.prod-controls {
    display: flex;
    flex-direction: row;
}

.add-btn {
    text-transform: none;
}

</style>
