<?php
require ("../Models/modelo_icono.php");

    //$codicono = $_POST["codicono"];
    $desicono = $_POST["desicono"];
    $imagen = $_POST["imagen"];

    $modicono=new modelo_icono();
    $icono=new obj_icono();
    $icono->setDesicono($desicono);
    //$icono->setCodicono($codicono);
    $icono->setImagen($imagen);

    //echo $icono->getCodicono();
    echo $icono->getDesicono();

    if($modicono->agregarIcono($icono))
        echo "exito , agrego un Icono correctamente";
    else echo"error al agregar un Icono";
?>