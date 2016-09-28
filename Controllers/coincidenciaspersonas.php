<?php
require('../Models/modelo_persona.php');

$e=$_POST['e'];
if ($e!="")
{


$coincidencias=new modelo_persona();
$busquedas=$coincidencias->conincidenciasPersonabyLicencia($e);

if ($busquedas)
{
    for($i=0;$i<count($busquedas);$i++)
    {
        $a=$i;
        echo ' <tr id="'.$a.'" onclick="escogerpersona(this.id);">';
        echo'<td id="licencia'.$i.'">'.$busquedas[$i]->getLicencia().'</td>
         <td id="nombre'.$i.'">'.$busquedas[$i]->getNombre().'</td>
         <td id="apellido'.$i.'">'.$busquedas[$i]->getApellido().'</td>
         
		</td>';

    }

}
else{
    echo "no se a encontrado coincidencias";
}
}