<?php

require('../Models/modelo_persona.php');

/**
 * Created by PhpStorm.
 * User: edson
 * Date: 23/07/2016
 * Time: 12:02 AM
 */
$licencia=$_POST['licencia'];
//$licencia="H98765425";


$mod_persona = new modelo_persona();
if ($mod_persona->eliminarByLicencia($licencia)) {
	echo "se ha eliminado un registro";
}
else{
	echo "no se pudo eliminar el registro";
}
