<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        p.clasificacion {
        position: relative;
        overflow: hidden;
        display: inline-block;
        }

        p.clasificacion input {
        position: absolute;
        top: -100px;
        }

        p.clasificacion label {
        float: right;
        color: #333;
        font-size: 20px;
        }

        p.clasificacion label:hover,
        p.clasificacion label:hover ~ label,
        p.clasificacion input:checked ~ label {
        color: orange;
        }
    </style>
</head>
    <title>My Songs API</title>
</head>
<body class="bg-warning-subtle">
    <div class="mb-5 bg-warning d-flex justify-content-between align-items-center">
    <a class="nav-link active ms-5 mb-5" href="enrutador.php?accion=mostrarCanciones" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></a>
        <?php 
        if($_REQUEST['accion']=="mostrarTopSongs"){
        ?>
        <p class="display-4   text-dark p-4">
        
        <i class="bi bi-music-note"></i> - MIS TOP CANCIONES - <i class="bi bi-music-note-beamed"></i>
        <?php
        }else{
        ?>
        <p class="display-4   text-dark p-4">
        
        <i class="bi bi-music-note"></i> - MIS CANCIONES - <i class="bi bi-music-note-beamed"></i>
        <?php
        }
        ?>
        
        
        </p>
        <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Cerrar sesión</button>

    </div>
    <div class="container">
        <?php 
        if ($_REQUEST['accion'] == "mostrarCanciones") {
            ?>
            <div>
        <a href="enrutador.php?accion=mostrarTopSongs" class="btn btn-dark">Ver Top Canciones</a>
        </div>
            <?php 
        }
        ?>

        
