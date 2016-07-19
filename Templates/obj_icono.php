<?php

class obj_icono
{
    private $codicono;
    private $desicono;
    private $imagen;
    function __construct()
    {
        $this->codicono=null;
        $this->desicono=null;
        $this->imagen=null;
    }

    public function getCodicono()
    {
        return $this->codicono;
    }

    public function getDesicono()
    {
        return $this->desicono;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setCodicono($codicono)
    {
        $this->codicono = $codicono;
    }

    public function setDesicono($desicono)
    {
        $this->desicono = $desicono;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}