<?php
class ControladorCanciones {

    //metodo que muestra la lista de canciones
    public static function mostrarCanciones(){
        VistaMostrarCanciones::render();
    }

    //metodo que modifica la puntuacion de la cancion
    public static function modificarPuntuacion($modi){

        require_once('vendor/autoload.php');
        $client = new \GuzzleHttp\Client();

        $response = $client->request('PUT', 'http://node:3000/api/song/'.$modi['id'].'', [
            'json' => [
                "puntuacion"=>$modi["puntuacion"]
            ],
            'headers' => [
                'authorization' => $_SESSION['tokenKey'],
            ],
        ]);

        echo "<script>window.location='enrutador.php?accion=mostrarCanciones';</script>";
    }

    //metodo que muestra la lista de top 10 de canciones
    public static function mostrarTopSongs(){
        VistaMostrarCanciones::render2();
    }
}
?>