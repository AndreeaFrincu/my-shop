import BaseRepository from './BaseRepository'
import Genre from "../models/Genre";

export default class GenreRepository extends BaseRepository {
    constructor() {
        super(Genre);
    }
}
