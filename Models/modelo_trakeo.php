<?php
require("../Templates/obj_trakeo.php");
require("../Models/modelo_conduce.php");

class modelo_trakeo
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getTrakeoById($codigo)
    {
        $this->obj_conexion->conectar();
        $sql="select * from trakeo WHERE codigo='$codigo'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $trakeo=new obj_trakeo();
            $trakeo->setCodigo($row[0]);
            $trakeo->setPlacaT($row[1]);
            $trakeo->setCodLugarT($row[2]);
            $trakeo->setFecha($row[3]);
            $trakeo->setHora($row[4]);
            $trakeo->setVelocidad($row[5]);
            return $trakeo;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getTrakeoByPlaca($placa)
    {
        $this->obj_conexion->conectar();
        $sql="select * from trakeo WHERE placa='$placa'";

        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {   $trakeos=array();
            while ($row = mysqli_fetch_array($result)) {

                $trakeo=new obj_trakeo();
                $trakeo->setCodigo($row[0]);
                $trakeo->setPlacaT($row[1]);
                $trakeo->setCodLugarT($row[2]);
                $trakeo->setFecha($row[3]);
                $trakeo->setHora($row[4]);
                $trakeo->setVelocidad($row[5]);
                $trakeos[]=$trakeo;

            }
            return $trakeos;
        }
        elseif ($num_rows==5){
            $row=mysqli_fetch_row($result);
            $trakeo=new obj_trakeo();
            $trakeo->setCodigo($row[0]);
            $trakeo->setPlacaT($row[1]);
            $trakeo->setCodLugarT($row[2]);
            $trakeo->setFecha($row[3]);
            $trakeo->setHora($row[4]);
            $trakeo->setVelocidad($row[5]);
            return $trakeo;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }


    public function getTrakeoByLicencia($licencia){
        $this->obj_conexion->conectar();

        $sql="SELECT conduce.placa FROM (persona join conduce on persona.licencia=conduce.licencia) where persona.licencia='$licencia'";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            $row=mysqli_fetch_row($result);
            return $row[0];
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }
    public function getAll(){
        $this->obj_conexion->conectar();

        $personas=array();
        $sql="select * from trakeo where 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {

                $trakeo=new obj_trakeo();
                $trakeo->setCodigo($row[0]);
                $trakeo->setPlacaT($row[1]);
                $trakeo->setCodLugarT($row[2]);
                $trakeo->setFecha($row[3]);
                $trakeo->setHora($row[4]);
                $trakeo->setVelocidad($row[5]);
                $trakeos[]=$trakeo;

            }
            return $personas;
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }

}