<?php
require ("../Models/modelo_lugar.php");
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 18/11/2016
 * Time: 7:40 PM
 */
$lugar= new obj_lugar();
$lugar->setLatitud($_POST["Latitud"]);
$lugar->setLongitud($_POST["Longitud"]);
$lugar->setNomLugar($_POST["Nombre"]);
$lugar->setCodLugar($_POST["codLugar"]);

$modelolugar=new modelo_lugar();
if ($modelolugar->agregarLugar($lugar))
{
    echo "correcto";
}
else
{
    echo "error , no se puede agregar la ubicacion";
}