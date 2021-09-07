import _ from "lodash";

export default {
    getProducts: state => {
        let result = _.cloneDeep(state.productsList)

        // filters
        if (state.selectedGenreList.length > 0) {
            result = result.filter((product) => {
                return product.genres.some((genre) => {
                    return state.selectedGenreList.some((currentSelectedGenre) => {
                        return currentSelectedGenre.id === genre.id
                    })
                })
            })
        }

        // sorting
        if (state.sortBy) {
            let sortDirection = state.sortBy[0] === '+' ? 1 : -1
            let sortKey = state.sortBy.slice(1)
            result = result.sort(function (a, b) {
                let valueA = _.get(a, sortKey)
                let valueB = _.get(b, sortKey)
                if (valueA > valueB) return 1 * sortDirection;
                if (valueA < valueB) return -1 * sortDirection;
                return 0;
            })
        }

        //set per page
        state.perPage = result.length
        return result
    },
    getProductsPaginated: (state, getters) => {
        let result = getters['getProducts']
        // paginate
        if (state.perPage) {
            result = result.slice((state.currentPage - 1) * state.perPage,
                state.currentPage * state.perPage)
        }
        return result
    },
    getGenres: state => {
        return state.genresList
    },
    getSelectedGenreName: state => {
        return state.selectedGenreList.map(obj => obj.genre)
    }
}
