<?php
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 20/11/2016
 * Time: 12:35 AM
 */
$lugar= new obj_lugar();
$lugar->setId($_POST["Id"]);
$lugar->setLatitud($_POST["Latitud"]);
$lugar->setLongitud($_POST["Longitud"]);
$lugar->setNomLugar($_POST["Nombre"]);
$lugar->setCodLugar($_POST["codLugar"]);

$modelolugar=new modelo_lugar();
if ($modelolugar->actualizarLugar($lugar))
{
    echo 1;
}
else
{
    echo 0;
}