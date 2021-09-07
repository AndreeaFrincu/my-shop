export default class apiTransformer {
    static transformFromApi() {
        throw new Error('must implement transformFromApi')
    }

    static transformToApi() {
        throw new Error('must implement transformToApi')
    }

    static transformFromApiList(list) {
        if (!list) {
            return []
        }
        return list.map(currentItem => this.transformToApi(currentItem))
    }

    static transformFromApiTable(table) {
        table.data = this.transformFromApiList(table.data)
        return table
    }

    static transformToApiList(list) {
        if (!list) {
            return []
        }
        return list.map(currentItem => this.transformToApi(currentItem))
    }

    static transformToApiTable(table) {
        table.data = this.transformToApiList(table.data)
        return table
    }
}
