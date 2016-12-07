<?php
require ("../Models/modelo_lugar.php");
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 20/11/2016
 * Time: 12:35 AM
 */
$id=$_POST['id'];
$modlugar=new modelo_lugar();
if ($modlugar->eliminarById($id))
{
    echo 1;
}
else
{
    echo 0;
}