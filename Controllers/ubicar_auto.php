<?php

require('../Models/modelo_busqueda.php');


$placa=$_POST['placa'];


$Mod_busqueda = new modelo_busqueda();

$busquedas=$Mod_busqueda->getUbicationByPlaca($placa);
if ($busquedas)
{


        $data=array();
        $data['licencia']= $busquedas->getLicencia();
        $data['placa']= $busquedas->getPlaca();
        $data['nombreC']= $busquedas->getNombreC();
        $data['apellidoC']= $busquedas->getApellidoC();
        $data['fecha']= $busquedas->getFecha();
        $data['hora']= $busquedas->getHora();
        $data['velocidad']= $busquedas->getVelocidad();
        $data['nomLugar']= utf8_encode($busquedas->getNomLugar());
        $data['latitud']= $busquedas->getLatitud();
        $data['longitud']= $busquedas->getLongitud();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);



}
else{
    echo "no encontrado";
}