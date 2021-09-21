import BaseRepository from './BaseRepository'
import User from "../models/User";
import state from "../pages/auth/store/state";
import api from "../authentication/Api";

export default class UserRepository extends BaseRepository {
    constructor() {
        super(User);
    }

    create() {
        api.get('/csrf-cookie').then(response => {
            console.log(response)
            api.post('/register', state.currentUser)
            .then((response2) => {
                console.log(response2)
            })
            .catch((error) => {
                console.log(error)
            })
        })
    }

    // login() {
    //     api.get('/csrf-cookie').then(response => {
    //         // console.log(response)
    //         api.post('/login', state.loginFormUser)
    //         .then(response2 => {
    //             console.log(response2);
    //         })
    //         .catch((error) => {
    //             console.log(error)
    //         })
    //     });
    // }
}
