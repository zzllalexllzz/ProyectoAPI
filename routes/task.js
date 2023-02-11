const express = require('express');
const TaskController = require("../controllers/task");
const api = express.Router();

//Middleware
const md_auth = require('../middlewares/authenticated');


//endpoint

//crea tarea
api.post("/task", TaskController.createTask);

//consulta las tareas
api.get("/task", [md_auth.ensureAuth], TaskController.getTasks);

//consulatar una tarea
api.get("/task/:id", TaskController.getTask);

//borrar una tarea
api.delete("/task/:id", TaskController.deleteTask);

//actualizar las tarea
api.put("/task/:id", TaskController.updateTask);

module.exports = api;