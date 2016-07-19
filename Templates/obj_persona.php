<?php

class obj_persona
{
    private $licencia;
    private $nombre;
    private $apellido;
    private $celular;
    private $direccion;
    private $email;
    private $foto;

    function __construct() {
        $this->licencia=null;
        $this->nombre=null;
        $this->apellido=null;
        $this->celular=null;
        $this->direccion=null;
        $this->email=null;
        $this->foto=null;
    }

    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getLicencia()
    {
        return $this->licencia;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFoto()
    {
        return $this->foto;
    }
    public function unsetPersona()
    {
        $this->licencia=null;
        $this->nombre=null;
        $this->apellido=null;
        $this->celular=null;
        $this->direccion=null;
        $this->email=null;
        $this->foto=null;
    }
}