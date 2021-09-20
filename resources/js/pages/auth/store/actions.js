import UserRepository from "../../../repositories/UserRepository";
import User from "../../../models/User";
import state from "./state";
import {userTransformer} from "../../../transformers/UserTransformer";

export default {
    async loadCurrentUser({commit}, form) {
        commit('setCurrentUser', form)

        state.currentUser = userTransformer.transformFromApiRegisterUser(state.currentUser)
        // console.log('verify register', state.currentUser)
    },

    async loginFormUser({commit}, form) {
        commit('setLoginFormUser', form)

        console.log('verify login', state.loginFormUser)
    },

    async postUser() {
        await new UserRepository(new User()).create()
    },

    async loginUser() {
        await new UserRepository(new User()).login()
    }
}
