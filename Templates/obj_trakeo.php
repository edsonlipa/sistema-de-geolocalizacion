<?php

class obj_trakeo
{
    private $placa;
    private $marca;
    private $color;
    private $foto;
    private $idLugar;
    private $nomLugar;
    private $codLugar;
    private $latitud;
    private $longitud;
    private $fecha;
    private $hora;
    private $velocidad;
    private $codicono;

    function __construct()
    {
        $this->placa=null;
        $this->marca=null;
        $this->color=null;
        $this->foto=null;
        $this->idLugar=null;
        $this->nomLugar=null;
        $this->codLugar=null;
        $this->latitud=null;
        $this->longitud=null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
        $this->codicono=null;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getIdLugar()
    {
        return $this->idLugar;
    }

    /**
     * @param mixed $idLugar
     */
    public function setIdLugar($idLugar)
    {
        $this->idLugar = $idLugar;
    }

    /**
     * @return mixed
     */
    public function getNomLugar()
    {
        return $this->nomLugar;
    }

    /**
     * @param mixed $nomLugar
     */
    public function setNomLugar($nomLugar)
    {
        $this->nomLugar = $nomLugar;
    }

    /**
     * @return mixed
     */
    public function getCodLugar()
    {
        return $this->codLugar;
    }

    /**
     * @param mixed $codLugar
     */
    public function setCodLugar($codLugar)
    {
        $this->codLugar = $codLugar;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return null
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param null $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return null
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param null $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return null
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    /**
     * @param null $velocidad
     */
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    /**
     * @return mixed
     */
    public function getCodicono()
    {
        return $this->codicono;
    }

    /**
     * @param mixed $codicono
     */
    public function setCodicono($codicono)
    {
        $this->codicono = $codicono;
    }


    public function unsetTrakeo()
    {
        $this->placa=null;
        $this->marca=null;
        $this->color=null;
        $this->foto=null;
        $this->idLugar=null;
        $this->nomLugar=null;
        $this->codLugar=null;
        $this->latitud=null;
        $this->longitud=null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
        $this->codicono=null;
    }
}