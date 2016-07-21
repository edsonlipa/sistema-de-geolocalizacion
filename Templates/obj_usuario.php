<?php

class obj_usuario
{
    private $id;
    private $nombre;
    private $usuario;
    private $password;
    private $tipo;

    public function __construct()
    {
        $this->id = null;
        $this->nombre = null;
        $this->usuario = null;
        $this->password = null;
        $this->tipo = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function unsetUsuario()
    {
        $this->id = null;
        $this->nombre = null;
        $this->usuario = null;
        $this->password = null;
        $this->tipo = null;
    }

}