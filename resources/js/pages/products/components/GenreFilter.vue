<template>
    <div class="filter-content">
        <md-checkbox v-model="boolean"
                     class="md-primary" @change="filterProduct">
            {{ genre.genre }}
        </md-checkbox>
    </div>
</template>

<script>

export default {
    name: "GenreFilter",
    props: {
        genre: {},
        checked: {
            type: Boolean,
            default: false
        }
    },
    watch: {
        checked: {
            handler(newValue) {
                this.boolean = newValue
            }
        }
    },
    data: () => ({
        boolean: false
    }),
    methods: {
        filterProduct() {
            this.$emit("input", {genre: this.genre, value: this.boolean})
        }
    }
}
</script>

<style scoped>

.filter-content {
    padding: 0;
}

</style>
