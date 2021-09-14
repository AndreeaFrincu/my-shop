import _ from "lodash";

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
    }
}
