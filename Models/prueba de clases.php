<?php
require ("../Models/modelo_conduce.php");
//require("../Templates/obj_persona.php");
/**
 * este archivo sirve unicmante para pruebas de clases...

 *************************************************************************************************
 *$modelopersona=new modelo_persona();
$resultado=$modelopersona->getPersonaByLicencia("H48611309");
echo $resultado->getDireccion() ;
 *
 *************************************************************************************************

$modelopersona=new modelo_persona();
$persona=new obj_persona();
$persona->setLicencia("Q72468156");
$persona->setNombre("Victor");
$persona->setApellido("Lipa");
$persona->setDireccion("Cerro colorado");
$persona->setCelular("987654321");
$persona->setEmail("victor@gmail.com");
$persona->setFoto("victor.jpg");
echo $modelopersona->agregarPersona($persona);
 * *******************************************************************************************
 $modelopersona=new modelo_persona();
$persona=new obj_persona();
$persona->setLicencia("Q72468156");
$persona->setNombre("Victor");
$persona->setApellido("Lipa");
$persona->setDireccion("Selva Alegre #500");
$persona->setCelular("987654321");
$persona->setEmail("victor@gmail.com");
$persona->setFoto("victor.jpg");
echo $modelopersona->actualizarPersona($persona);
echo $modelopersona->eliminarByObjeto($persona);
 * ************************************************************************************************


$modelopersona=new modelo_persona();
$lista=$modelopersona->getAll();//[0]->getNombre();

foreach ($lista as $person)
{
    echo $person->getApellido(). "<br>";
}
 * $auto=new obj_auto();
$auto->setPlaca("Q12345678");
$auto->setCodicono(1);
$auto->setColor($row[2]);
$auto->setFoto($row[3]);
$auto->setMarca($row[4]);
 * *******************************************************************************************
 */
$modeloauto=new modelo_conduce();


echo $modeloauto->getConduceById(1)->getLicenciaC();