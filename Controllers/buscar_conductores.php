<?php
require('../Models/modelo_persona.php');

/**
 * Created by PhpStorm.
 * User: edson
 * Date: 22/12/16
 * Time: 07:03 AM
 */
$placa=$_POST['placa'];
//$placa="V6A-477";

$mod_persona = new modelo_persona();
$persona=$mod_persona->getPersonaByConduce($placa);

if($persona)
{
    $jpersona=array();
    $html_total;
    for($i=0;$i<count($persona);$i++)
    {
        /*$data=array();
        $data['licencia']=$persona[$i]->getLicencia();
        $data['nombre']=$persona[$i]->getNombre();
        $data['apellido']=$persona[$i]->getApellido();
        $data['celular']=$persona[$i]->getCelular();
        $data['direccion']=utf8_encode($persona[$i]->getDireccion());
        $data['email']=$persona[$i]->getEmail();
        $data['foto']=$persona[$i]->getFoto();
        $jpersona[$i]=$data;*/
        $html= '<tr>
            <th scope="row">'.$persona[$i]->getLicencia().'</th>
            <td>'.$persona[$i]->getNombre().'</td>
            <td>'.$persona[$i]->getApellido().'</td>
            <td>'.$persona[$i]->getCelular().'</td>
        </tr>
        ';
        $html_total=$html_total.$html;
    }
    $jpersona['html']=$html_total;
    $jpersona['cantidad']=count($persona);
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jpersona);

}
else{
    echo "no encontrado";
}