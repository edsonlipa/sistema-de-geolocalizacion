<?php

class obj_lugar
{
    private $id;
    private $nomLugar;
    private $latitud;
    private $longitud;
    private $codLugar;

    function __construct()
    {
        $this->id=null;
        $this->nomLugar=null;
        $this->latitud=null;
        $this->longitud=null;
        $this->codLugar=null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNomLugar()
    {
        return $this->nomLugar;
    }

    public function setNomLugar($nomLugar)
    {
        $this->nomLugar = $nomLugar;
    }

    public function getLatitud()
    {
        return $this->latitud;
    }

    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    public function getLongitud()
    {
        return $this->longitud;
    }

    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    public function getCodLugar()
    {
        return $this->codLugar;
    }

    public function setCodLugar($codLugar)
    {
        $this->codLugar = $codLugar;
    }

}