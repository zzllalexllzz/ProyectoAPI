const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const SongSchema = Schema({
    titulo: {
        type: String,
        require: false
    },
    grupoMusical: {
        type: String,
        require: false
    },
    duracion: {
        type: String,
        require: false
    },
    anio: {
        type: String,
        require: false
    },
    genero: {
        type: String,
        require: false
    },
    puntuacion: {
        type: Number,
        require: false
    }
});

module.exports = mongoose.model("Song", SongSchema);