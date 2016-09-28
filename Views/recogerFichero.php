<?php

    $archivo = $_FILES['file']['tmp_name'];
    $nombre_archivo = $_FILES['file']['name'];
    $info = pathinfo($nombre_archivo)['extension'];
    $directorioNuevo ="../Resources/img/";
    move_uploaded_file($archivo, $directorioNuevo.$nombre_archivo);

?>

