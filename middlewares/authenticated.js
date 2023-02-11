const moment = require('moment');
const jwt = require("../services/jwt");

const SECRET_KEY = 'asdalkshv3516dkhañad18225sjñsa';

function ensureAuth(req, res, next) {
    //obtener la cabecera de una peticion
    //donde mandar el token

    if(!req.headers.authorization) {
        return res.status(403).send({ msg : "Token no enviado en la cabecera" });
    }else{
        const token = req.headers.authorization.replace(/['"]+/g, "");

        //Comprobamos que el token es valido
        const payload = jwt.decodeToken(token, SECRET_KEY);

        try{

            //Comprobar la fecha de expiracino del token
            if(payload.exp <= moment().unix()){
                return res.status(400).send({ msg: "Token Expirado" });
            }


        }catch(error){
            return res.status(404).send({ msg: "Token invalido" });
        }

        req.user = payload;
        next();
    }
}

module.exports = {
    ensureAuth,
}