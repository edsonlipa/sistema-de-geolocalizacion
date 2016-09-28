<?php
require("../Templates/obj_conduce.php");
require("conexion.php");

class modelo_conduce
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }

    public function getConduceById($id)
    {
        $this->obj_conexion->conectar();
        $sql="select * from conduce WHERE id='$id'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $conduce=new obj_conduce();
            $conduce->setIdC($row[0]);
            $conduce->setLicenciaC($row[1]);
            $conduce->setPlacaC($row[2]);
            return $conduce;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getConduceByLicencia($licencia)
    {
        $this->obj_conexion->conectar();
        $sql="select * from conduce WHERE licencia='$licencia'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows==1)
        {
            $row=mysqli_fetch_row($result);
            $conduce=new obj_conduce();
            $conduce->setIdC($row[0]);
            $conduce->setLicenciaC($row[1]);
            $conduce->setPlacaC($row[2]);
            return $conduce;
        }
        elseif ($num_rows>1){
            $ConduceS=array();
            while ($row = mysqli_fetch_array($result)) {

                $conduce=new obj_conduce();
                $conduce->setIdC($row[0]);
                $conduce->setLicenciaC($row[1]);
                $conduce->setPlacaC($row[2]);
                $ConduceS[]=$conduce;

            }
            return $ConduceS;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    /////////////////////////////////////////////////////////////////////
    //                       agreagar formas diferente de agreger por objeton conduce o con objetos auto y persona
    /////////////////////////////////////////////////////////////////////
    public function agregarConduce(obj_persona $persona,obj_auto $auto)
    {
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $placa=$auto->getPlaca();
        $tabla="INSERT INTO conduce (id, licencia, placa) ";
        $valores="VALUES (NULL,'$licencia','$placa');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarConduce(obj_conduce $conduce){
        $this->obj_conexion->conectar();
        $id=$conduce->getIdC();
        $licencia=$conduce->getLicenciaC();
        $placa=$conduce->getPlacaC();

        $sql="UPDATE conduce SET id = '$id',
              licencia='$licencia',placa='$placa' WHERE id = '$id';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_conduce &$conduce){
        $this->obj_conexion->conectar();
        $id=$conduce->getIdC();
        $query="DELETE FROM conduce where licencia='$id';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $conduce->unsetConduce();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function eliminarById($id){
        $this->obj_conexion->conectar();
        $query="DELETE FROM conduce where id='$id';";
        $result=$this->obj_conexion->query($query);
        if(!$result){
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
}