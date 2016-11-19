<?php
require("../Templates/obj_propietario.php");
require("conexion.php");

class modelo_propietario
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }

    public function getPropietarioById($id)
    {
        $this->obj_conexion->conectar();
        $sql="select * from propietario WHERE id='$id'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $propietario=new obj_propietario();
            $propietario->setIdC($row[0]);
            $propietario->setLicenciaC($row[1]);
            $propietario->setPlacaC($row[2]);
            return $propietario;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getPropietarioByLicencia($licencia)
    {
        $this->obj_conexion->conectar();
        $sql="select * from propietario WHERE licencia='$licencia'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows==1)
        {
            $row=mysqli_fetch_row($result);
            $propietario=new obj_conduce();
            $propietario->setIdC($row[0]);
            $propietario->setLicenciaC($row[1]);
            $propietario->setPlacaC($row[2]);
            return $propietario;
        }
        elseif ($num_rows>1){
            $PropietarioS=array();
            while ($row = mysqli_fetch_array($result)) {

                $propietario=new obj_propietario();
                $propietario->setIdC($row[0]);
                $propietario->setLicenciaC($row[1]);
                $propietario->setPlacaC($row[2]);
                $PropietarioS[]=$propietario;

            }
            return $PropietarioS;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    /////////////////////////////////////////////////////////////////////
    //                       agreagar formas diferente de agreger por objeton conduce o con objetos auto y persona
    /////////////////////////////////////////////////////////////////////
    public function agregarPropietario(obj_persona $persona,obj_auto $auto)
    {
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $placa=$auto->getPlaca();
        $tabla="INSERT INTO propietario (id, licencia, placa) ";
        $valores="VALUES (NULL,'$licencia','$placa');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarPropietario(obj_propietario $propietario){
        $this->obj_conexion->conectar();
        $id=$propietario->getIdC();
        $licencia=$propietario->getLicenciaC();
        $placa=$propietario->getPlacaC();

        $sql="UPDATE propietario SET id = '$id',
              licencia='$licencia',placa='$placa' WHERE id = '$id';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_propietario &$propietario){
        $this->obj_conexion->conectar();
        $id=$propietario->getIdC();
        $query="DELETE FROM propietario where licencia='$id';";
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
        $query="DELETE FROM propietario where id='$id';";
        $result=$this->obj_conexion->query($query);
        if(!$result){
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
}