import _ from "lodash";

export default {
    getProductsPaginated: (state, getters) => {
        let result = getters['getProducts']
        // paginate
        if (state.perPage) {
            result = result.slice((state.currentPage - 1) * state.perPage,
                state.currentPage * state.perPage)
        }
        return result
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
