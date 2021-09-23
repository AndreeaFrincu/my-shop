export default {
    setNewUser(state, registerForm) {
        state.newUser.username = registerForm.username
        state.newUser.password = registerForm.password
        state.newUser.firstName = registerForm.firstName
        state.newUser.lastName = registerForm.lastName
        state.newUser.email = registerForm.email
    },

    setLoginFormUser(state, loginForm) {
        state.loginFormUser.username = loginForm.username
        state.loginFormUser.password = loginForm.password
    },

    setAuthenticatedUser(state, authUser) {
        state.authenticatedUser.username = authUser.username
        state.authenticatedUser.password = authUser.password
        state.authenticatedUser.firstName = authUser.firstName
        state.authenticatedUser.lastName = authUser.lastName
        state.authenticatedUser.email = authUser.email
    },
}
