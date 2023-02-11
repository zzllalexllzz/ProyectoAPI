const bcryptjs = require('bcryptjs');
const jwt = require('../services/jwt');
const User = require("../models/user");

//metodo que crea un ususario
async function register(req, res) {

    const user = new User();
    const params = req.body;
    //otra forma de hacer
    //const {name,lastName,email,password} =  req.body;
    //user.name = name;

    const salt = await bcryptjs.genSalt(10);

    user.name = params.name;
    user.lastname = params.lastname;
    user.email = params.email;
    user.password = await bcryptjs.hash(params.password,salt);

    try {

        if (!params.password) throw {msg: "Debes introducir un password"}

        //comprobar que el email ya es esta registrado en la bd
        const foundEmail = await User.findOne({email: params.email});
        if (foundEmail) throw {msg:"Email ya registrado"};

        //inserta en mongodb
        const userStore = await user.save();

        if (!userStore) {
            res.status(400).send({msg: "Usuario no guardada correctamente, datos erroneos"});
        } else {
            res.status(200).send({msg:userStore});
        }

    } catch (error) {
        res.status(500).send(error);
    }

}

//metodo login de usuario registrado
async function login(req, res){
    const {email, password} = req.body;

    try {

        const user = await User.findOne({email: email});
        if (!user) throw {smg: "El email o password incorrectos"};

        //vuelve a generar con el hash con el password reibido en el request.
        //si coincide con el que ya hayen la bbdd (user.password) entoces ok.
        const passwordSuccess = await bcryptjs.compare(password, user.password);
        if (!passwordSuccess) throw {smg: "El email o password incorrectos"};

        res.status(200).send({token: jwt.createToken(user,"24h")});

    } catch (error) {
        res.status(500).send(error);
    }
}


module.exports={
    register,
    login,
}