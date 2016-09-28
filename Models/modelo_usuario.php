<?php
require("../Templates/obj_usuario.php");
require("conexion.php");

class modelo_usuario
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getUsuarioByUsuario($usuario)
    {
        $this->obj_conexion->conectar();
        $sql="select * from usuarios WHERE usuario='$usuario'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $usuario=new obj_usuario();
            $usuario->setId($row[0]);
            $usuario->setNombre($row[1]);
            $usuario->setUsuario($row[2]);
            $usuario->setPassword($row[3]);
            $usuario->setTipo($row[4]);
            return $usuario;

        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getUsuarioById($id)
    {
        $this->obj_conexion->conectar();
        $sql="select * from usuarios WHERE id='$id'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $row=mysqli_fetch_row($result);
            $usuario=new obj_usuario();
            $usuario->setId($row[0]);
            $usuario->setNombre($row[1]);
            $usuario->setUsuario($row[2]);
            $usuario->setPassword($row[3]);
            $usuario->setTipo($row[4]);
            return $usuario;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function agregarUsuario(obj_usuario $usuario){
        $this->obj_conexion->conectar();
        $id=$usuario->getid();
        $nombres=$usuario->getNombre();
        $usuarios=$usuario->getUsuario();
        $password=$usuario->getPassword();
        $tipo=$usuario->getTipo();


        $tabla="INSERT INTO usuarios (id, nombres, usuario, password, tipo) ";
        $valores="VALUES (NULL,'$nombres', '$usuarios', '$password','$tipo');";
        $sql=$tabla.$valores;

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function actualizarUsuario(obj_usuario $usuario){
        $this->obj_conexion->conectar();
        $id=$usuario->getid();
        $nombres=$usuario->getNombre();
        $usuarios=$usuario->getUsuario();
        $password=$usuario->getPassword();
        $tipo=$usuario->getTipo();


        $sql="UPDATE usuarios SET id = '$id',
              nombres='$nombres',usuario='$usuarios',
              password='$password',tipo='$tipo' WHERE id = '$id';";

        $result=$this->obj_conexion->conexion->query($sql);
        if(!$result){
            return 0;
        }
        return $result;
        $this->obj_conexion->cerrar();
    }
    public function eliminarByObjeto(obj_usuario &$usuario){
        $this->obj_conexion->conectar();
        $id=$usuario->getid();
        $query="DELETE FROM usuarios where id='$id';";
        $result=$this->obj_conexion->conexion->query($query);
        if(!$result){
            $usuario->unsetusuario();
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function eliminarById($id){
        $this->obj_conexion->conectar();
        $query="DELETE FROM usuarios where id='$id';";
        $result=$this->obj_conexion->query($query);
        if(!$result){
            return 0;
        }
        $this->obj_conexion->cerrar();
        return $result;
    }
    public function getAll(){
        $this->obj_conexion->conectar();

        $usuarios=array();
        $sql="select * from usuarios where 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {
                $usuario=new obj_usuario();
                $usuario->setId($row[0]);
                $usuario->setNombre($row[1]);
                $usuario->setUsuario($row[2]);
                $usuario->setPassword($row[3]);
                $usuario->setTipo($row[4]);
                $usuarios[]=$usuario;
            }
            return $usuarios;
        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }
}