import BaseRepository from './BaseRepository'
import User from "../models/User";
import state from "../pages/auth/store/state";
import axios from "axios";

export default class UserRepository extends BaseRepository {
    constructor() {
        super(User);
    }

    create() {
        axios.post('/api/users', state.currentUser)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
    }

    login() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            // console.log(response)
            axios.post('/api/users/login', )
            .then(response2 => {
                console.log(response2);
            })
        });
    }
}
