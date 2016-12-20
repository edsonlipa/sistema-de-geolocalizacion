<?php
require_once('../Models/modelo_trakeo.php');

$start=$_POST['start_date'];
$ending=$_POST['ending_date'];
$placa=$_POST['placa'];

//$placa="V6A-477";
//$start="2016-05-12";
//$ending="2016-08-15";
$modtrakeo = new modelo_trakeo();
$trakeos = $modtrakeo->getBusquedaBy_PlacaBetweenFech($placa,$start,$ending);

if($trakeos)
{
    $jtrakeos=array();
    for($i=0;$i<count($trakeos);$i++)
    {
    $data=array();
        $data['placa']= $trakeos[$i]->getPlaca();
        $data['marca']= $trakeos[$i]->getMarca();
        $data['color']= $trakeos[$i]->getColor();
        $data['foto']= $trakeos[$i]->getFoto();
        $data['idLugar']= $trakeos[$i]->getIdLugar();
        $data['nomLugar']= utf8_encode($trakeos[$i]->getNomLugar());
        $data['codLugar']= utf8_encode($trakeos[$i]->getCodLugar());
        $data['latitud']= $trakeos[$i]->getLatitud();
        $data['longitud']= $trakeos[$i]->getLongitud();
        $data['fecha']= $trakeos[$i]->getFecha();
        $data['hora']= $trakeos[$i]->getHora();
        $data['velocidad']= $trakeos[$i]->getVelocidad();
        $data['icono']= $trakeos[$i]->getCodicono();

        $jtrakeos[$i]=$data;

       }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jtrakeos);
}
else{
    echo "no encontrado";
}