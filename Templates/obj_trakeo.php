<?php
require ("../Models/modelo_lugar.php");
require ("../Models/modelo_auto.php");

class obj_trakeo
{
    private $codigo;
    private $placaT;
    private $codLugarT;
    private $fecha;
    private $hora;
    private $velocidad;
    function __construct()
    {
        $this->codigo=null;
        $this->placaT=null;
        $this->codLugarT=null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
    }


    public function getCodigo()
    {
        return $this->codigo;
    }


    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }


    public function getPlacaT()
    {
        return $this->placaT;
    }

    public function setPlacaT($placaT)
    {
        $this->placaT = $placaT;
    }

    public function getCodLugarT()
    {
        return $this->codLugarT;
    }

    public function setCodLugarT($codLugarT)
    {
        $this->codLugarT = $codLugarT;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }
    public function getLugar()
    {
        if ($this->codLugarT){
            $M_lugar=new modelo_lugar();
            return $M_lugar->getLugarById($this->codLugarT);
        }
        else{
            return 0;
        }
    }
    public function getAuto()
    {
        if ($this->placaT){
            $M_auto=new modelo_auto();
            return $M_auto->getAutoByPlaca($this->placaT);
        }
        else{
            return 0;
        }
    }
    public function unsetTrakeo()
    {
        $this->codigo=null;
        $this->placaT=null;
        $this->codLugarT=null;
        $this->fecha=null;
        $this->hora=null;
        $this->velocidad=null;
    }
}