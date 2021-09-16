import BaseModel from './BaseModel'

export default class User extends BaseModel {

    resource() {
        return 'users'
    }
}
