<?php
require("../Templates/obj_conduce.php");
require("conexion.php");
//el modelo de trakeo aunesta inconplto no debe de usarse
class modelo_conduce
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }

    public function getTrakeoBycodigo($codigo)
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
    /////////////////////////////////////////////////////////////////////
    //                       agreagar formas diferente de agreger por objeton trakeo o con objetos auto y persona
    /////////////////////////////////////////////////////////////////////
    public function agregarTrakeo(obj_persona $persona,obj_auto $auto)
    {
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $placa=$auto->getPlaca();
        $tabla="INSERT INTO trakeo (codigo, licencia, placa) ";
        $valores="VALUES (NULL,'$licencia','$placa');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarTrakeo(obj_trakeo $trakeo){
        $this->obj_conexion->conectar();
        $codigo=$trakeo->getcodigoC();
        $licencia=$trakeo->getLicenciaC();
        $placa=$trakeo->getPlacaC();



        $sql="UPDATE trakeo SET codigo = '$codigo',
              licencia='$licencia',placa='$placa' WHERE codigo = '$codigo';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_trakeo &$trakeo){
        $this->obj_conexion->conectar();
        $codigo=$trakeo->getcodigoC();
        $query="DELETE FROM trakeo where licencia='$codigo';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $trakeo->unsettrakeo();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function eliminarByCodigo($codigo){
        $this->obj_conexion->conectar();
        $query="DELETE FROM trakeo where codigo='$codigo';";
        $result=$this->obj_conexion->query($query);
        if(!$result){
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
}