import BaseModel from './BaseModel'

export default class Genre extends BaseModel {
    // Set the resource route of the model
    resource() {
        return 'genres'
    }
}
