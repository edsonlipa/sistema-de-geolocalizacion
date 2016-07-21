<?php
require("../Templates/obj_trakeo.php");
require("conexion.php");

class modelo_trakeo
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
}