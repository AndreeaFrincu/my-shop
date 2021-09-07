import _ from "lodash";
// import Database from "../../../database/Database";

const state = {
    productsList: [],
    genresList: [],
    selectedGenreList: [],
    sortBy: null,
    perPage: null,
    currentPage: 1
}
const mutations = {
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
    },
}
const actions = {
    setProducts({commit}) {
        //retrieve data
        let products = [{
            id: 1,
            title: "a",
            author: "auth1",
            price: 27,
            quantity: 1,
            cartPosition:0,
            genres: [
                {
                    id: 1,
                    genre: "Historical Fiction"
                },
                {
                    id: 2,
                    genre: "Comedy"
                },
                {
                    id: 3,
                    genre: "Mystery"
                }
            ]
        },
            {
                id: 2,
                title: "b",
                author: "auth2",
                price: 15,
                quantity: 1,
                cartPosition:0,
                genres: [
                    {
                        id: 3,
                        genre: "Mystery"
                    },
                    {
                        id: 4,
                        genre: "Supernatural"
                    },
                    {
                        id: 5,
                        genre: "Fantasy"
                    }
                ]
            },
            {
                id: 3,
                title: "c",
                author: "auth3",
                price: 10,
                quantity: 1,
                cartPosition:0,
                genres: [
                    {
                        id: 5,
                        genre: "Fantasy"
                    },
                    {
                        id: 6,
                        genre: "Science Fiction"
                    },
                    {
                        id: 7,
                        genre: "Adventure"
                    }
                ]
            },
            {
                id: 4,
                title: "d",
                author: "auth4",
                price: 50,
                quantity: 1,
                cartPosition:0,
                genres: [
                    {
                        id: 7,
                        genre: "Adventure"
                    },
                    {
                        id: 8,
                        genre: "Dystopian"
                    },
                    {
                        id: 9,
                        genre: "History"
                    }
                ]
            },
            {
                id: 5,
                title: "e",
                author: "auth5",
                price: 35,
                quantity: 1,
                cartPosition:0,
                genres: [
                    {
                        id: 9,
                        genre: "History"
                    },
                    {
                        id: 10,
                        genre: "Thriller"
                    },
                    {
                        id: 1,
                        genre: "Historical Fiction"
                    }
                ]
            },
            {
                id: 6,
                title: "f",
                author: "auth6",
                price: 21,
                quantity: 1,
                cartPosition:0,
                genres: [
                    {
                        id: 10,
                        genre: "Thriller"
                    },
                    {
                        id: 1,
                        genre: "Historical Fiction"
                    },
                    {
                        id: 2,
                        genre: "Comedy"
                    }
                ]
            }]
        let genres = [{
            id: 1,
            genre: "Historical Fiction"
        },
            {
                id: 2,
                genre: "Comedy"
            },
            {
                id: 3,
                genre: "Mystery"
            },
            {
                id: 4,
                genre: "Supernatural"
            },
            {
                id: 5,
                genre: "Fantasy"
            },
            {
                id: 6,
                genre: "Science Fiction"
            },
            {
                id: 7,
                genre: "Adventure"
            },
            {
                id: 8,
                genre: "Dystopian"
            },
            {
                id: 9,
                genre: "History"
            },
            {
                id: 10,
                genre: "Thriller"
            }]

        //set data
        commit('setProducts', products)
        commit('setGenres', genres)
    }
}
const getters = {
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

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}
