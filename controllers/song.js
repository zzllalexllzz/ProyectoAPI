const Song = require("../models/song");

//metodo que crea una cancion
async function createSong(req, res) {
    const song = new Song();
    const params = req.body;

    song.titulo = params.titulo;
    song.grupoMusical = params.grupoMusical;
    song.duracion = params.duracion;
    song.anio = params.anio;
    song.genero = params.genero;
    song.puntuacion = params.puntuacion;
    

    try {
        const songStore = await song.save();

        if (!songStore) {
            res.status(400).send({msg: "Cancion no guardada correctamente"});
        } else {
            res.status(200).send({msg:songStore});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que lista todas las canciones
async function getSongs(req, res)  {
    try {
        const songs = await Song.find();

        if (!songs) {
            res.status(400).send({msg: "Error: al obtener las canciones"});
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo para sacar una cancion por id
async function getSong(req, res)  {
    const idSong = req.params.id;
    try {
        const song = await Song.findById(idSong);

        if (!song) {
            res.status(400).send({msg: "No se ha encontrado esa cancion"});
        } else {
            res.status(200).send(song);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que lista todas las primeras 10 canciones
async function getSongTen(req, res)  {
    try {
        const songs = await Song.find().sort({puntuacion: -1}).limit(10);

        if (!songs) {
            res.status(400).send({msg: "Error: al obtener las 10 canciones"});
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que lista todas las canciones de un genero determinado
async function getSongGen(req, res)  {
    const gen = req.params.genero;
    try {
        const songs = await Song.find({genero: gen});

        if (!songs) {
            res.status(400).send({msg: "Error: al obtener las canciones del genero dado"});
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que borra una cancion por id
async function deleteSong(req, res)  {
    const idSong = req.params.id;
    try {
        //const task = await Task.deleteOne({ _id: idTask });
        const song = await Song.findByIdAndDelete(idSong);

        if (!song) {
            res.status(400).send({msg: "No se ha encontrado esa cancion para borrar"});
        } else {
            res.status(200).send({msg:"Cancion borrada", song:song});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que actualiza una cancion por id
async function updateSong(req, res) {
    //cacar el id  de la url del endpoint
    const idSong = req.params.id;

    //sacar los cambios de la tarea en el body
    const bodyJson = req.body;
    bodyJson.puntuacion;

    try {
        //const task = await Task.updateOne({ _id: idTask });
        const song = await Song.findByIdAndUpdate(idSong, {$inc: {puntuacion: bodyJson.puntuacion}});

        if (!song) {
            res.status(400).send({msg: "No se ha encontrado esa cancion para Modificar"});
        } else {
            res.status(200).send({msg:"Cancion modificada", song:song});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}



module.exports={
    createSong,
    getSongs,
    getSong,
    getSongTen,
    getSongGen,
    deleteSong,
    updateSong,
}