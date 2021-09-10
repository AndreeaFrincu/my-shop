import BaseRepository from './BaseRepository'
import Author from "../models/Author";

export default class AuthorRepository extends BaseRepository {
    constructor() {
        super(Author);
    }
}
