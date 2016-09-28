<?php
require("../Templates/obj_icono.php");
require("conexion.php");

class modelo_icono
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }

    public function getIconoById($id)
    {
        $this->obj_conexion->conectar();
        $sql="select * from icono WHERE codicono='$id'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $conduce=new obj_icono();
            $conduce->setCodicono($row[0]);
            $conduce->setDesicono($row[1]);
            $conduce->setImagen($row[2]);
            return $conduce;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }

    public function agregarIcono(obj_icono $icono)
    {
        $this->obj_conexion->conectar();
        $imagen=$icono->getImagen();
        $desicono=$icono->getDesicono();
        $tabla="INSERT INTO icono (codicono, desicono, imagen) ";
        $valores="VALUES (NULL,'$desicono','$imagen');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    }
?>