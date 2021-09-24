import UserRepository from "../../../repositories/UserRepository";
import User from "../../../models/User";
import state from "./state";
import {userTransformer} from "../../../transformers/UserTransformer";

export default {
    loadNewUser({commit}, form) {
        commit('setNewUser', form)

        state.newUser = userTransformer.transformToApiRegisterUser(state.newUser)
        // console.log('verify register', state.newUser)
    },

    loginFormUser({commit}, form) {
        commit('setLoginFormUser', form)
    },

    async postUser() {
        await new UserRepository(new User()).create()
    },

    async loginUser({commit}) {
        let apiUser = await new UserRepository(new User()).login()

        let user = userTransformer.transformFromApiAuthenticatedUser(apiUser[0])

        commit('setAuthenticatedUser', user)
    },

    async logoutUser() {
        await new UserRepository(new User()).logout()
    },

    async loadCurrentUser({commit}) {
        let apiUser = await new UserRepository(new User())
            .fetchAuthenticatedUser()

        let user = userTransformer.transformFromApiAuthenticatedUser(apiUser[0])

        commit('setAuthenticatedUser', user)
        console.log('auth user', user)

    },

    refreshUserOnLogout({commit}, form) {
        commit('setAuthenticatedUser', form)
    }
}
