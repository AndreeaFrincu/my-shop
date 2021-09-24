import BaseRepository from './BaseRepository'
import User from "../models/User";
import state from "../pages/auth/store/state";
import axios from "axios";

let api = axios.create({
    baseURL: 'http://my-shop.valet/api'
})

api.defaults.withCredentials = true;

export default class UserRepository extends BaseRepository {
    constructor() {
        super(User)
    }

    create() {
        api.post('/register', state.newUser)
        .then((response2) => {
            console.log(response2)
        })
        .catch((error) => {
            console.log(error)
        })
    }

    async login() {
        let result = await api.get('/csrf-cookie')
        console.log('result', result)

        if(result.status !== 204){
            return
        }

        let loginForm = await api.post('/login', state.loginFormUser)

        return await User.custom('user').get()
    }

    async logout() {
        let logout = await api.post('/logout')
    }

    async fetchAuthenticatedUser() {
        // return await User.custom('user').get()
        let user = await api.get('/user')

        console.log(user.data)

        if(user.status === 200){
            return user.data
        }
        else {
            return {
                'username': null,
                'password': null,
                'firstName': null,
                'lastName': null,
                'email': null,
            }
        }
    }
}
