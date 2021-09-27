import store from "../../store";

export default {
    beforeRouteEnter: (to, from, next) => {
        store.dispatch('auth/loadCurrentUser')
            .then(response => {
                next()
                // console.log('ok')
            })
            .catch(err => {
                next({name: 'auth_err'})
                // console.log('not ok')
            })
    }
}
