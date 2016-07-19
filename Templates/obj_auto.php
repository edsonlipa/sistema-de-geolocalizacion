<?php


class obj_auto
{
    private $placa;
    private $codicono;
    private $color;
    private $foto;
    private $marca;

    function __construct()
    {
        $this->placa=null;
        $this->codicono=null;
        $this->color=null;
        $this->foto=null;
        $this->marca=null;
    }

    public function getCodicono()
    {
        return $this->codicono;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getMarca()
    {
        return $this->marca;
    }

   public function getPlaca()
    {
        return $this->placa;
    }

    public function setCodicono($codicono)
    {
        $this->codicono = $codicono;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }


}