<?php
require("../Templates/obj_lugar.php");
require("conexion.php");
class modelo_lugar
{
    private $obj_conexion;
    public function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getLugarById($id)
    {
        $this->obj_conexion->conectar();
        $sql="select * from lugar WHERE id='$id'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $lugar=new obj_lugar();
            $lugar->setid($row[0]);
            $lugar->setNomLugar($row[1]);
            $lugar->setLatitud($row[2]);
            $lugar->setLongitud($row[3]);
            $lugar->setCodLugar($row[4]);
            return $lugar;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function agregarLugar(obj_lugar $lugar){
        $this->obj_conexion->conectar();

        $nomLugar=$lugar->getNomLugar();
        $latitud=$lugar->getLatitud();
        $longitud=$lugar->getLongitud();
        $codLugar=$lugar->getCodLugar();



        $tabla="INSERT INTO lugar (id, nomLugar, latitud, longitud, codLugar) ";
        $valores="VALUES (NULL,'$nomLugar', '$latitud', '$longitud','$codLugar');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarlugar(obj_lugar $lugar){
        $this->obj_conexion->conectar();
        $id=$lugar->getId();
        $nomLugar=$lugar->getNomLugar();
        $latitud=$lugar->getLatitud();
        $longitud=$lugar->getLongitud();
        $codLugar=$lugar->getCodLugar();


        $sql="UPDATE lugar SET id = '$id',
              nomLugar='$nomLugar',latitud='$latitud',
              longitud='$longitud',codLugar='$codLugar' WHERE id = '$id';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_lugar &$lugar){
        $this->obj_conexion->conectar();
        $id=$lugar->getid();
        $query="DELETE FROM lugar where id='$id';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $lugar->unsetLugar();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }

    public function getAll(){
        $this->obj_conexion->conectar();

        $lugars=array();
        $sql="select * from lugar where 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {

                $lugar=new obj_lugar();
                $lugar->setid($row[0]);
                $lugar->setNomLugar($row[1]);
                $lugar->setLatitud($row[2]);
                $lugar->setLongitud($row[3]);
                $lugar->setCodLugar($row[4]);
                $lugars[]=$lugar;
            }

            return $lugars;
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }
}