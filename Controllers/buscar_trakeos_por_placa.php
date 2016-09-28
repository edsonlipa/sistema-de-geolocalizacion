<?php
require_once('../Models/modelo_trakeo.php');
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 22/07/2016
 * Time: 9:47 AM
 */

$jtrakeos=array();
//$id=$_POST['id'];
//$placa=$_POST['placa'];
$placa="V6A-477";

$modtrakeo = new modelo_trakeo();
$trakeos = $modtrakeo->getTrakeoByPlaca($placa);
if($trakeos)
{


    for($i=0;$i<count($trakeos);$i++)
    {
    $data=array();
    $data['codigo']= $trakeos[$i]->getCodigo();
    $data['codlugar']= $trakeos[$i]->getCodLugarT();
    $data['placa']= $trakeos[$i]->getPlacaT();
    $data['fecha']= $trakeos[$i]->getFecha();
    $data['hora']= $trakeos[$i]->getHora();
    $data['velocidad']= $trakeos[$i]->getVelocidad();

        $jtrakeos[$i]=$data;

       }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jtrakeos);
    //exit();


}
elseif (count($trakeos)>0){
    echo $trakeos[0]->getPlacaT();
}
else{
    echo "no encontrado";
}