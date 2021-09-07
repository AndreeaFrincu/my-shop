export default {
    setProducts(state, value) {
        state.productsList = value
    },
    setGenres(state, value) {
        state.genresList = value
    },
    setSelectedGenreList(state, value) {
        state.selectedGenreList = value
    },
    setSortBy(state, value) {
        state.sortBy = value
    },
    setPerPage(state, value) {
        state.perPage = value
    },
    setCurrentPage(state, value) {
        state.currentPage = value
    }
}
