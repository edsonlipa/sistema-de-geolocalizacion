<?php
require("../Templates/obj_persona.php");
require("conexion.php");

class modelo_persona
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getPersonaByNombre($nombre)
    {
        $this->obj_conexion->conectar();
        $sql="select * from persona WHERE nombre='$nombre'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $persona=new obj_persona();
            $persona->setLicencia($row[0]);
            $persona->setNombre($row[1]);
            $persona->setApellido($row[2]);
            $persona->setDireccion($row[3]);
            $persona->setCelular($row[4]);
            $persona->setEmail($row[5]);
            $persona->setFoto($row[6]);
            return $persona;

        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getPersonaByLicencia($licencia)
    {
        $this->obj_conexion->conectar();
        $sql="select * from persona WHERE licencia='$licencia'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $persona=new obj_persona();
            $persona->setLicencia($row[0]);
            $persona->setNombre($row[1]);
            $persona->setApellido($row[2]);
            $persona->setDireccion($row[3]);
            $persona->setCelular($row[4]);
            $persona->setEmail($row[5]);
            $persona->setFoto($row[6]);
            return $persona;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function agregarPersona(obj_persona $persona){
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $nombre=$persona->getNombre();
        $apellido=$persona->getApellido();
        $celular=$persona->getCelular();
        $direccion=$persona->getDireccion();
        $email=$persona->getEmail();
        $foto=$persona->getFoto();


        $tabla="INSERT INTO persona (licencia, nombre, apellido, direccion, celular, email, foto) ";
        $valores="VALUES ('$licencia','$nombre', '$apellido', '$celular','$direccion','$email','$foto');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarPersona(obj_persona $persona){
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $nombre=$persona->getNombre();
        $apellido=$persona->getApellido();
        $celular=$persona->getCelular();
        $direccion=$persona->getDireccion();
        $email=$persona->getEmail();
        $foto=$persona->getFoto();


        $sql="UPDATE persona SET licencia = '$licencia',
              nombre='$nombre',apellido='$apellido',
              celular='$celular',direccion='$direccion',
              email='$email',foto='$foto' WHERE licencia = '$licencia';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_persona &$persona){
        $this->obj_conexion->conectar();
        $licencia=$persona->getLicencia();
        $query="DELETE FROM persona where licencia='$licencia';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $persona->unsetPersona();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function eliminarByLicencia($licencia){
        $this->obj_conexion->conectar();
        $query="DELETE FROM persona where licencia='$licencia';";
        $result=$this->obj_conexion->query($query);
        if(!$result){
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function getAll(){
        $this->obj_conexion->conectar();

        $personas=array();
        $sql="select * from persona where 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {
                $persona=new obj_persona();
                $persona->setLicencia($row[0]);
                $persona->setNombre($row[1]);
                $persona->setApellido($row[2]);
                $persona->setDireccion($row[3]);
                $persona->setCelular($row[4]);
                $persona->setEmail($row[5]);
                $persona->setFoto($row[6]);
                $personas[]=$persona;
            }
            return $personas;
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }

}