<template>
    <div class="genres-wrapper">
        <md-toolbar>
            <span class="md-subheading">Genres</span>
        </md-toolbar>
        <div class="genres-list">
            <genre-filter

                v-for="genre in getGenres" :key="genre.id"
                :checked="isGenreSelected(genre)"
                :genre="genre"
                @input="onGenreSelected"
            ></genre-filter>
        </div>
    </div>
</template>

<script>
import _ from "lodash"
import {mapGetters} from "vuex";
import GenreFilter from "./GenreFilter";

export default {
    name: "GenreFilterList",
    components: {GenreFilter},
    computed: {
        ...mapGetters({
            getGenres: 'products/getGenres'
        }),
        selectedGenres() {
            return this.$store.state.products.selectedGenreList
        }
    },
    methods: {
        onGenreSelected({value, genre}) {
            let genreList = _.cloneDeep(this.$store.state.products.selectedGenreList)
            if (value) {
                genreList.push(genre)
                this.$store.dispatch('products/filterProducts')
            } else {
                genreList = genreList.filter(item => item.id !== genre.id)
            }
            this.$store.commit('products/setSelectedGenreList', genreList)
        },
        isGenreSelected(targetGenre) {
            return this.selectedGenres.some(item => item.id === targetGenre.id)
        }
    }
}
</script>

<style scoped>

.genres-wrapper {
    padding: 20px;
}

#genres-list {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.genres-list {
    padding-left: 15px;
    height: 200px;
    width: 100%;
    overflow-y: auto;
}

.genres-list::-webkit-scrollbar {
    width: 1em;
}

.genres-list::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.genres-list::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
}

</style>
