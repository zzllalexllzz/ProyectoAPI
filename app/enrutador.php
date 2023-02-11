<?php
    session_start();
    //session_destroy();

    //AUTOLOAD
    function autocarga($clase){
        $ruta = "./controladores/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./modelos/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }
    }
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //pinta el formulario de login usuarios
            if ($_REQUEST['accion'] == "inicio") {

                ControladorUsuario::loginUser();
            }

            //si el usuario no existe pinta el formulario con el error de login
            if ($_REQUEST['accion'] == "error") {

                ControladorUsuario::loginUserError();
            }

            //checklogin metodo que verifica el email y password
            if ($_REQUEST['accion'] == "checkLogin") {
                $login["email"] = filtrado($_REQUEST['email']);
                $login["password"] = filtrado($_REQUEST['password']);

                ControladorUsuario::chequearLogin($login);
            }

            // pinta las cacniones si el login es correcto
            if ($_REQUEST['accion'] == "mostrarCanciones") {
                ControladorCanciones::mostrarCanciones();
            }

            //recoge los datos enviados por el formulario
            if ($_REQUEST['accion'] == "modificar") {

                $modi['id'] = filtrado($_REQUEST['id']);
                $modi['puntuacion'] = filtrado($_REQUEST['puntuacion']);
                //echo $modi['puntuacion'];

                ControladorCanciones::modificarPuntuacion($modi);
            }

            // pinta las cacniones si el login es correcto
            if ($_REQUEST['accion'] == "mostrarTopSongs") {

                ControladorCanciones::mostrarTopSongs();
            }
            // //guarda los datos recogidos en un array asociativo
            // if ($_REQUEST['accion'] == "guardarArticulo") {

            //     $articulo['titulo'] = filtrado($_REQUEST['titulo']);
            //     $articulo['texto'] = filtrado($_REQUEST['texto']);
            //     $articulo['imagen'] = filtrado($_REQUEST['imagen']);
            //     $articulo['fecha'] = filtrado(date("d/m/Y"));

            //     ControladorArticulo::guardarArticulo($articulo);
            // }
        }
    }





?>