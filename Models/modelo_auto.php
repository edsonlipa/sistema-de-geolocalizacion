<?php
require("../Templates/obj_auto.php");
require("conexion.php");

class modelo_auto
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getAutoByPlaca($placa)
    {
        $this->obj_conexion->conectar();
        $sql="select * from auto WHERE placa='$placa'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $auto=new obj_auto();
            $auto->setPlaca($row[0]);
            $auto->setCodicono($row[1]);
            $auto->setCodicono($row[2]);
            $auto->setFoto($row[3]);
            $auto->setMarca($row[4]);
            return $auto;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function agregarAuto(obj_auto $auto){
        $this->obj_conexion->conectar();
        $placa=$auto->getLicencia();
        $codicono=$auto->getNombre();
        $color=$auto->getApellido();
        $foto=$auto->getCelular();
        $marca=$auto->getDireccion();



        $tabla="INSERT INTO auto (placa, codicono, color, foto, marca) ";
        $valores="VALUES ('$placa','$codicono', '$color', '$foto','$marca');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarAuto(obj_auto $auto){
        $this->obj_conexion->conectar();
        $placa=$auto->getLicencia();
        $codicono=$auto->getNombre();
        $color=$auto->getApellido();
        $foto=$auto->getCelular();
        $marca=$auto->getDireccion();


        $sql="UPDATE auto SET placa = '$placa',
              codicono='$codicono',color='$color',
              foto='$foto',marca='$marca' WHERE placa = '$placa';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_auto &$auto){
        $this->obj_conexion->conectar();
        $placa=$auto->getPlaca();
        $query="DELETE FROM auto where placa='$placa';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $auto->unsetAuto();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }

    public function getAll(){
        $this->obj_conexion->conectar();

        $autos=array();
        $sql="select * from auto where 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {

                $auto=new obj_auto();
                $auto->setPlaca($row[0]);
                $auto->setCodicono($row[1]);
                $auto->setCodicono($row[2]);
                $auto->setFoto($row[3]);
                $auto->setMarca($row[4]);
                $autos[]=$auto;
            }

            return $autos;
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }
}
