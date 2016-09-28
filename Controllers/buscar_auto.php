<?php

require('../Models/modelo_auto.php');

/**
 * Created by PhpStorm.
 * User: edson
 * Date: 23/07/2016
 * Time: 12:02 AM
 */
$licencia=$_POST['licencia'];


$mod_persona = new modelo_auto();
$persona=$mod_persona->getPersonaByLicencia($licencia);
        $data=array();
        $data['licencia']=$persona->getLicencia();
        $data['nombre']=$persona->getNombre();
        $data['apellido']=$persona->getApellido();
        $data['celular']=$persona->getCelular();
        $data['direccion']=$persona->getDireccion();
        $data['email']=$persona->getEmail();
        $data['foto']=$persona->getFoto();

       
    
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($data);

//echo $Mod_busqueda->getBusquedaBy_LicenciaPlaca($licencia,$placa)[1]->getNomLugar();
//$busquedas=$Mod_busqueda->getBusquedaBy_LicenciaPlaca($licencia,$placa);
