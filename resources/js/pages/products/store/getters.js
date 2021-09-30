export default {
    getTotalProducts: state => {
      return state.totalProducts
    },
    getProducts: state => {
        return state.productsList
    },
    getGenres: state => {
        return state.genresList
    },
    getSelectedGenreName: state => {
        return state.selectedGenreList.map(obj => obj.name)
    },
    getCurrentPage: state => {
        return state.currentPage
    },
    getPerPage: state => {
        return state.perPage
    },
    getSortBy: state => {
        return state.sortBy
    }
}
