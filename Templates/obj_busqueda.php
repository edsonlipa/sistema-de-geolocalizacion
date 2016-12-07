<?php


class obj_busqueda
{
    private $licencia;
    private $nombreC;
    private $apellidoC;
    private $placa;
    private $fecha;
    private $hora;
    private $velocidad;
    private $nomLugar;
    private $latitud;
    private $longitud;

    private $fecha_inicio;
    private $fecha_fin;

    /**
     * obj_busqueda constructor.
     * @param $licencia
     * @param $placa
     * @param $fecha_inicio
     * @param $fecha_fin
     */
   // public function __construct($licencia, $placa, $fecha_inicio, $fecha_fin)
    public function __construct()
    {
        $this->licencia = null;
        $this->placa = null;
        $this->fecha_inicio = null;
        $this->fecha_fin = null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
        $this->nomLugar=null;
        $this->latitud=null;
        $this->longitud=null;
    }

    /**
     * @return mixed
     */
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * @param mixed $licencia
     */
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    /**
     * @return mixed
     */
    public function getNombreC()
    {
        return $this->nombreC;
    }

    /**
     * @param mixed $nombreC
     */
    public function setNombreC($nombreC)
    {
        $this->nombreC = $nombreC;
    }
    /**
     * @return mixed
     */
    public function getApellidoC()
    {
        return $this->apellidoC;
    }

    /**
     * @param mixed $apellidoC
     */
    public function setApellidoC($apellidoC)
    {
        $this->apellidoC = $apellidoC;
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
     * @return null
     */
    public function getNomLugar()
    {
        return $this->nomLugar;
    }

    /**
     * @param null $nomLugar
     */
    public function setNomLugar($nomLugar)
    {
        $this->nomLugar = $nomLugar;
    }

    /**
     * @return null
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param null $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return null
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param null $longitu
     */
    public function setLongitud($longitu)
    {
        $this->longitud = $longitu;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    function unsetBusqueda()
    {
        $this->licencia = null;
        $this->placa = null;
        $this->fecha_inicio = null;
        $this->fecha_fin = null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
        $this->nomLugar=null;
        $this->latitud=null;
        $this->longitud=null;
    }


}