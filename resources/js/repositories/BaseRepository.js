import axios from "axios";

export default class BaseRepository {
    constructor(model) {
        if(model == null) {
            throw new Error('The model is null')
        }
        this.model = model
    }

    async fetchAll() {
        return await this.model.all()
    }

    async fetchOne(id) {
        return await this.model.find(id)
    }
}
