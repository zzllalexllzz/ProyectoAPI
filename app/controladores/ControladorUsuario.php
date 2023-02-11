<?php
class ControladorUsuario{

    //metodo que muestra el formulario del loguin
    public static function loginUser(){
        VistaUserFormulario::render("");
    }

    //metodo que muestra el formulario con el error del usuario
    public static function loginUserError() {
        $mensaje = "Error de login, prueba otra vez";
        VistaUserFormulario::render($mensaje);
    }

    //metodo que comprueba que el usuario existe el al base de datos
    public static function chequearLogin($login){

        require_once('vendor/autoload.php');
        $client = new \GuzzleHttp\Client();

        try {

            // $response = $client->request('POST', 'http://192.168.22.61:3000/api/login', [
            //     'body' => '{"email":"'.$login["email"].'","password":"'.$login["password"].'"}',
            //     'headers' => [
            //         'accept' => 'application/json',
            //         'content-type' => 'application/json',
            //     ],
            // ]);

            $response = $client->request('POST', 'http://node:3000/api/login', [
                'json' => [
                    "email" => "".$login["email"]."",
                    "password" => "".$login["password"].""
                ],
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ],
            ]);

            $respuesta = $response->getBody();

            $respuestaJSON = json_decode($respuesta,true);

            $text = $respuestaJSON["token"];
            //echo $text;
            //$text1 = $respuestaJSON["smg"];
            //echo $text1;

            //Error login
            if ($text == "") {
                //echo "<script>window.location='enrutador.php?accion=error';</script>";
            }else {
                $_SESSION['tokenKey'] = $text;
                echo "<script>window.location='enrutador.php?accion=mostrarCanciones';</script>";
            }

        } catch (Exception $e) {
            echo "<script>window.location='enrutador.php?accion=error';</script>";
        }

    }

}
?>