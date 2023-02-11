<?php
class VistaMostrarCanciones{

    public static function render(){

        require_once('vendor/autoload.php');
        $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'http://node:3000/api/song', [
                'body' => '{}',
                'headers' => [
                    'authorization' => $_SESSION['tokenKey'],
                ],
            ]);

            $respuesta = $response->getBody();

            $respuestaJSON = json_decode($respuesta);
            $songs = $respuestaJSON;
            include "./cabecera.php";

            echo '<div class="mt-5">
            <table class="table table-striped table-hover text-center m-5">
                <thead class="table-dark">
                    <tr>
                        <th>TITULO</th>
                        <th>GRUPO MUSC</th>
                        <th>DURACION</th>
                        <th>AÑO</th>
                        <th>GENERO</th>
                        <th>PUNTUACION</th>
                        <th>VALORAR</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>';

                foreach ($songs as $key => $song) {
                    echo'<tr>
                        <td>'.$song->titulo.'</td>
                        <td>'.$song->grupoMusical.'</td>
                        <td>'.$song->duracion.'</td>
                        <td>'.$song->anio.'</td>
                        <td>'.$song->genero.'</td>
                        <td>'.$song->puntuacion.'</td>
                        <form class="user" action="enrutador.php" method="post">
                        <input type="hidden" name="id" value="'.$song->_id.'">
                        <td>
                            <input type="hidden" name="puntuacion" value="0">
                            <p class="clasificacion">
                                <input id="radio1'.$song->_id.'" type="radio" name="puntuacion" value="5">
                                <label for="radio1'.$song->_id.'">★</label>
                                <input id="radio2'.$song->_id.'" type="radio" name="puntuacion" value="4">
                                <label for="radio2'.$song->_id.'">★</label>
                                <input id="radio3'.$song->_id.'" type="radio" name="puntuacion" value="3">
                                <label for="radio3'.$song->_id.'">★</label>
                                <input id="radio4'.$song->_id.'" type="radio" name="puntuacion" value="2">
                                <label for="radio4'.$song->_id.'">★</label>
                                <input id="radio5'.$song->_id.'" type="radio" name="puntuacion" value="1">
                                <label for="radio5'.$song->_id.'">★</label>
                            </p>
                        </td>
                        <td>
                        <input type="hidden" name="accion" value="modificar">
                        <button type="submit" class="btn btn-outline-dark" ><i class="bi bi-pencil-square"></i></button>
                        </td>
                        </form>
                    </tr>';
                }

            echo '</tbody>
            </table>
            </div>';

            include "./pie.php";
    }
    public static function render2(){

        require_once('vendor/autoload.php');
        $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'http://node:3000/api/song/toprated', [
                'body' => '{}',
                'headers' => [
                    'authorization' => $_SESSION['tokenKey'],
                ],
            ]);

            $respuesta = $response->getBody();

            $respuestaJSON = json_decode($respuesta);
            $songs = $respuestaJSON;
            include "./cabecera.php";

            echo '<div class="mt-5">
            <table class="table table-striped table-hover text-center m-5">
                <thead class="table-dark">
                    <tr>
                        <th>TITULO</th>
                        <th>GRUPO MUSC</th>
                        <th>DURACION</th>
                        <th>AÑO</th>
                        <th>GENERO</th>
                        <th>PUNTUACION</th>
                        <th>VALORAR</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>';

                foreach ($songs as $key => $song) {
                    echo'<tr>
                        <td>'.$song->titulo.'</td>
                        <td>'.$song->grupoMusical.'</td>
                        <td>'.$song->duracion.'</td>
                        <td>'.$song->anio.'</td>
                        <td>'.$song->genero.'</td>
                        <td>'.$song->puntuacion.'</td>
                        <form class="user" action="enrutador.php" method="post">
                        <input type="hidden" name="id" value="'.$song->_id.'">
                        <td>
                            <input type="hidden" name="puntuacion" value="0">
                            <p class="clasificacion">
                                <input id="radio1'.$song->_id.'" type="radio" name="puntuacion" value="5">
                                <label for="radio1'.$song->_id.'">★</label>
                                <input id="radio2'.$song->_id.'" type="radio" name="puntuacion" value="4">
                                <label for="radio2'.$song->_id.'">★</label>
                                <input id="radio3'.$song->_id.'" type="radio" name="puntuacion" value="3">
                                <label for="radio3'.$song->_id.'">★</label>
                                <input id="radio4'.$song->_id.'" type="radio" name="puntuacion" value="2">
                                <label for="radio4'.$song->_id.'">★</label>
                                <input id="radio5'.$song->_id.'" type="radio" name="puntuacion" value="1">
                                <label for="radio5'.$song->_id.'">★</label>
                            </p>
                        </td>
                        <td>
                        <input type="hidden" name="accion" value="modificar">
                        <button type="submit" class="btn btn-outline-dark" ><i class="bi bi-pencil-square"></i></button>
                        </td>
                        </form>
                    </tr>';
                }

            echo '</tbody>
            </table>
            </div>';

            include "./pie.php";
    }
}
?>