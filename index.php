<?php

use Controller\Enrutador;

include_once ("controller/controlador.php");
include_once ("controller/enrutador.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zoologico</title>
</head>
<body>

    <h1>Zoologico php</h1>
    <p>Inicio <a href="?cargar=inicio">Inicio</a> </p>
    <p>Lista de animales <a href="?cargar=mostrar">Ver...</a></p>
    <p>Registrar un animal <a href='?cargar=registrar'>Registar</a></p>


    <?php
    // Verifica si la variable "cargar" fue enviada por la URL
    // Si no existe, se inicializa como una cadena vacía
        if (!isset($_GET["cargar"])){
            $_GET["cargar"] = "";
        }
    $enrutador = new Enrutador();

    // Primero se valida la vista solicitada
    // Si la validación es correcta, se carga la vista correspondiente
    if($enrutador->validarVista($_GET['cargar'])){
        $enrutador->cargarVista($_GET['cargar']);
    }
    ?>

</body>
</html>
<?php
