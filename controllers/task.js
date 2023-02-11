const Task = require("../models/task");

//metodo que crea una tarea
async function createTask(req, res) {
    const task = new Task();
    const params = req.body;

    task.title = params.title;
    task.description = params.description;

    try {
        const taskStore = await task.save();

        if (!taskStore) {
            res.status(400).send({msg: "Tarea no guardada correctamente"});
        } else {
            res.status(200).send({msg:taskStore});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que lista todas las tareas
async function getTasks(req, res)  {
    try {
        const tasks = await Task.find({completed:false}).sort({create_at: -1});

        if (!tasks) {
            res.status(400).send({msg: "Error: al obtener las tares"});
        } else {
            res.status(200).send(tasks);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//funcion para sacar una tarea por id
async function getTask(req, res)  {
    const idTask = req.params.id;
    try {
        const task = await Task.findById(idTask);

        if (!task) {
            res.status(400).send({msg: "No se ha encontrado esa tarea"});
        } else {
            res.status(200).send(task);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que borra una tarea por id
async function deleteTask(req, res)  {
    const idTask = req.params.id;
    try {
        //const task = await Task.deleteOne({ _id: idTask });
        const task = await Task.findByIdAndDelete(idTask);

        if (!task) {
            res.status(400).send({msg: "No se ha encontrado esa tarea para borrar"});
        } else {
            res.status(200).send({msg:"tarea borrada", task:task});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//metodo que actualiza un tarea por id
async function updateTask(req, res) {
    //cacar el id  de la url del endpoint
    const idTask = req.params.id;

    //sacar los cambios de la tarea en el body
    const bodyJson = req.body;

    try {
        //const task = await Task.updateOne({ _id: idTask });
        const task = await Task.findByIdAndUpdate(idTask, bodyJson);

        if (!task) {
            res.status(400).send({msg: "No se ha encontrado esa tarea para Modificar"});
        } else {
            res.status(200).send({msg:"tarea modificada", task:task});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}


module.exports={
    createTask,
    getTasks,
    getTask,
    deleteTask,
    updateTask,
}