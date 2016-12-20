<?php

require('../Models/modelo_trakeo.php');


$placa=$_POST['placa'];
//$placa='V6A-477';

$Mod_busqueda = new modelo_trakeo();

$busquedas=$Mod_busqueda->getUbicationByPlaca($placa);

if ($busquedas)
{

        $data=array();
        $data['id']= $busquedas->getIdLugar();
        $data['placa']= $busquedas->getPlaca();
        $data['marca']= $busquedas->getMarca();
        $data['color']= $busquedas->getColor();
        $data['foto']= $busquedas->getFoto();
        $data['idLugar']= $busquedas->getIdLugar();
        $data['nomLugar']= utf8_encode($busquedas->getNomLugar());
        $data['codLugar']= utf8_encode($busquedas->getCodLugar());
        $data['latitud']= $busquedas->getLatitud();
        $data['longitud']= $busquedas->getLongitud();
        $data['fecha']= $busquedas->getFecha();
        $data['hora']= $busquedas->getHora();
        $data['velocidad']= $busquedas->getVelocidad();
        $data['icono']= $busquedas->getCodicono();

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
}
else{
    echo "no encontrado";
}