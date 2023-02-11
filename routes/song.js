const express = require('express');
const SongController = require("../controllers/song");
const api = express.Router();

//Middleware
const md_auth = require('../middlewares/authenticated');

//endpoint

//crea tarea
api.post("/song", SongController.createSong);

//lista todas las caciones
api.get("/song", [md_auth.ensureAuth], SongController.getSongs);

//lista una una cancion mediante el id
api.get("/song/id/:id", SongController.getSong);

//lista las primeras 10 canciones
api.get("/song/toprated", [md_auth.ensureAuth], SongController.getSongTen);

//lista las canciones de un determinado genero
api.get("/song/genre/:genero", SongController.getSongGen);

//elimina una cancion por el id dado
api.delete("/song/id/:id", SongController.deleteSong);

//actualiza una cancion por el id dado
api.put("/song/:id", [md_auth.ensureAuth], SongController.updateSong);


module.exports = api;