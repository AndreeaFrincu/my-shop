import UserRepository from "../../../repositories/UserRepository";
import User from "../../../models/User";
import productTransformer from "../../../transformers/ProductTransformer";
import state from "./state";

export default {
    async loadCurrentUser({commit}, form) {
        commit('setCurrentUser', form)

        var newObj = {}
        for(var camel in state.currentUser) {
            newObj[productTransformer.transformToApi(camel)] = state.currentUser[camel]
        }

        console.log('bla bla', newObj)
    },

    async postUser() {
        await new UserRepository(new User()).create()
    }
}
