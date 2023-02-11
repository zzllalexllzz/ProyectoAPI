const express = require('express')
const app = express()

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// //Soluciona el problea de CORS.
// //Permitir peticiones a la API desde ese dominio. Poner *, para atender peticiones desde cualquier punto.
// app.use((req, res, next) => {
//     res.setHeader("Access-Control-Allow-Origin", "http://localhost:8080");
//     res.header(
//       "Access-Control-Allow-Headers",
//       "Origin, X-Requested-With, Content-Type, Accept"
//     );
//     next();
//   });

//cargar rutas
const task_routes= require("./routes/task");
const user_routes= require("./routes/user");
const song_routes= require("./routes/song");


//rutas base
app.use("/api", task_routes);
app.use("/api", user_routes);
app.use("/api", song_routes);


module.exports = app;