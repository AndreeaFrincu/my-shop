import UserRepository from "../../../repositories/UserRepository";
import User from "../../../models/User";
import state from "./state";
import {userTransformer} from "../../../transformers/UserTransformer";

export default {
    async loadCurrentUser({commit}, form) {
        commit('setCurrentUser', form)

        state.currentUser = userTransformer.transformFromApi(state.currentUser)
        console.log('verify', state.currentUser)
    },

    async postUser() {
        await new UserRepository(new User()).create()
    }
}
