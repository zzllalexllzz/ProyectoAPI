const express = require('express');
const UserController = require("../controllers/user");
const api = express.Router();

//endpoint

//crea usuario --registrar usuario
api.post("/user", UserController.register);

//login de usuario devuelve un token para luego hacer la llamadas api
api.post("/login", UserController.login);

/*
//consulta las tareas
api.get("/task", TaskController.getTasks);

//consulatar una tarea
api.get("/task/:id", TaskController.getTask);

//borrar una tarea
api.delete("/task/:id", TaskController.deleteTask);

//actualizar las tarea
api.put("/task/:id", TaskController.updateTask);
*/
module.exports = api;