<?php
require('../Models/modelo_auto.php');

$e=$_POST['e'];
if ($e!="")
{
    $coincidencias=new modelo_auto();
    $busquedas=$coincidencias->conincidenciasAutosbyPlaca($e);

    if ($busquedas)
    {
        for($i=0;$i<count($busquedas);$i++)
        {
            $a=$i;
            echo ' <tr id="'.$a.'" onclick="escogerAuto(this.id);">';
            echo'<td id="licencia'.$i.'">'.$busquedas[$i]->getPlaca().'</td>
         <td id="nombre'.$i.'">'.$busquedas[$i]->getColor().'</td>
         <td id="apellido'.$i.'">'.$busquedas[$i]->getMarca().'</td>
         
		</td>';

        }

    }
    else{
        echo "no se a encontrado coincidencias";
    }
}