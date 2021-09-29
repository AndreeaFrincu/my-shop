import apiTransformer from "./ApiTransformer";
import _ from 'lodash'

export class userTransformer extends apiTransformer {

    static transformToApi(item) {
        return {
            "id":_.get(item, 'id', null)
        }
    }

    static transformToApiRegisterUser(item) {
        return {
            "username":_.get(item, 'username', null),
            "password":_.get(item, 'password', null),
            "first_name":_.get(item, 'firstName', null),
            "last_name":_.get(item, 'lastName', null),
            "email":_.get(item, 'email', null),
        }
    }

    static transformFromApiAuthenticatedUser(item) {
        return {
            "username":_.get(item, 'username', null),
            "password":_.get(item, 'password', null),
            "firstName":_.get(item, 'first_name', null),
            "lastName":_.get(item, 'last_name', null),
            "email":_.get(item, 'email', null),
        }
    }
}
