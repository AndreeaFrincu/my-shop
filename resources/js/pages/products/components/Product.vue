<template>
    <div class="prod">
        <md-content class="md-primary product-content">
            <div class="book-info">
                <span class="book-info-text">title: {{ product.title }}</span>
                <span class="book-info-text">author: {{ product.author.name }}</span>
                <span class="book-info-text">genre: {{ product.genre.name }}</span>
            </div>
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

.product-content {
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-items: center;
}

.book-info {
    padding: 2px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.book-info-text {
    width: 100%;
    font-size: 12px;
    display: flex;
}

.add-btn {
    text-transform: none;
}

</style>
