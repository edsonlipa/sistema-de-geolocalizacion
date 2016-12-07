<?php
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 17/11/2016
 * Time: 11:20 PM
 */
require('../Models/modelo_lugar.php');
$modlugar = new modelo_lugar();

$lugares = $modlugar->getAll();
if ($lugares)
{
    for($i=0;$i<count($lugares);$i++)
    {
        $data=array();
        $data['id']= $lugares[$i]->getId();
        $data['nomLugar']= utf8_encode($lugares[$i]->getNomLugar());
        $data['latitud']= $lugares[$i]->getLatitud();
        $data['longitud']= $lugares[$i]->getLongitud();
        $data['codLugar']= utf8_encode($lugares[$i]->getCodLugar());

        $Jlugares[$i]=$data;
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($Jlugares);
}
else{
    echo "error al mostrar lugares";
}