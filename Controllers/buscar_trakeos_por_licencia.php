<?php

require('../Models/modelo_busqueda.php');

/**
 * Created by PhpStorm.
 * User: edson
 * Date: 23/07/2016
 * Time: 12:02 AM
 */
$licencia=$_POST['licencia'];
$placa=$_POST['placa'];
$inicio=$_POST['start_date'];
$fin=$_POST['ending_date'];
//$placa="V6A-477";
//$licencia="H48611309";
//$inicio="2016-07-20";
//$fin="2016-07-25";
$Mod_busqueda = new modelo_busqueda();

//echo $Mod_busqueda->getBusquedaBy_LicenciaPlaca($licencia,$placa)[1]->getNomLugar();
//$busquedas=$Mod_busqueda->getBusquedaBy_LicenciaPlaca($licencia,$placa);
$busquedas=$Mod_busqueda->getBusquedaBYAll($licencia,$placa,$inicio,$fin);
if ($busquedas)
{
    for($i=0;$i<count($busquedas);$i++)
    {
        $data=array();
        $data['licencia']= $busquedas[$i]->getLicencia();
        $data['placa']= $busquedas[$i]->getPlaca();
        $data['fecha']= $busquedas[$i]->getFecha();
        $data['hora']= $busquedas[$i]->getHora();
        $data['velocidad']= $busquedas[$i]->getVelocidad();
        $data['nomLugar']= utf8_encode($busquedas[$i]->getNomLugar());
        $data['latitud']= $busquedas[$i]->getLatitud();
        $data['longitud']= $busquedas[$i]->getLongitud();

        $Jbusquedas[$i]=$data;
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($Jbusquedas);
}
else{
    echo "no encontrado";
}