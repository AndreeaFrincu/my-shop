export default {
    setCurrentUser(state, registerForm) {
        state.currentUser.username = registerForm.username
        state.currentUser.password = registerForm.password
        state.currentUser.firstName = registerForm.firstName
        state.currentUser.lastName = registerForm.lastName
        state.currentUser.email = registerForm.email
    },

    setLoginFormUser(state, loginForm) {
        state.loginFormUser.username = loginForm.username
        state.loginFormUser.password = loginForm.password
    }
}
