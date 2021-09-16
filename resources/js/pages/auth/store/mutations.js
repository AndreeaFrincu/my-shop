export default {
    setCurrentUser(state, form) {
        state.currentUser.username = form.username
        state.currentUser.password = form.password
        state.currentUser.firstName = form.firstName
        state.currentUser.lastName = form.lastName
        state.currentUser.email = form.email
    }
}
