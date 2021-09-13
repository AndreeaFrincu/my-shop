<template>
    <md-chip class="md-primary genre-chip" md-deletable
             @md-delete="onFilterDelete">{{ genre }}
    </md-chip>
</template>

<script>
import _ from "lodash";

export default {
    name: "ProdChips",
    props: {
        genre: {}
    },
    methods: {
        onFilterDelete() {
            let genreList = _.cloneDeep(this.$store.state.products.selectedGenreList)
            const removeIndex = genreList.findIndex(item => item.genre === this.genre)
            genreList.splice(removeIndex, 1)

            this.$store.commit('products/setSelectedGenreList', genreList)
            this.$store.dispatch('products/filterProducts')
        }
    }
}
</script>

<style scoped>

</style>
