import axios from "axios";

let api = axios.create({
    baseURL: 'http://my-shop.valet/api'
})

api.defaults.withCredentials = true;

export default api
