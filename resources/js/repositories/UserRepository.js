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
}
