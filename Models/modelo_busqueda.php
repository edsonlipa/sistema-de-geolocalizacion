<?php
require("../Templates/obj_busqueda.php");
require("conexion.php");
class modelo_busqueda
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion=new conexion();
    }
    public function getBusquedaByLicencia($licencia)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where persona.licencia='$licencia'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaByPlaca($placa)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where conduce.placa='$placa'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBy_LicenciaPlaca($licencia,$placa)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where persona.licencia='$licencia'and conduce.placa='$placa'";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBy_BetweenFech($start_date,$ending_date)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where trakeo.fecha BETWEEN '$start_date'AND '$ending_date';";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBy_LicenBetweenFech($licencia,$start_date,$ending_date)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where persona.licencia='$licencia'and trakeo.fecha BETWEEN '$start_date'AND '$ending_date';";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBy_PlacaBetweenFech($placa,$start_date,$ending_date)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where conduce.placa='$placa'and trakeo.fecha BETWEEN '$start_date'AND '$ending_date';";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBYAll($licencia,$placa,$start_date,$ending_date)
    {
        $this->obj_conexion->conectar();
        $sql="SELECT  persona.licencia,conduce.placa,trakeo.fecha,trakeo.hora,trakeo.velocidad,lugar.nomLugar,lugar.latitud,lugar.longitud FROM (persona inner join conduce on persona.licencia=conduce.licencia)inner join trakeo on
conduce.placa=trakeo.placa inner join lugar on trakeo.codLugar=lugar.id where  persona.licencia='$licencia'and conduce.placa='$placa'and trakeo.fecha between '$start_date' and '$ending_date';";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_busqueda();
                $Busqueda->setLicencia($row[0]);
                $Busqueda->setPlaca($row[1]);
                $Busqueda->setFecha($row[2]);
                $Busqueda->setHora($row[3]);
                $Busqueda->setVelocidad($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setLatitud($row[6]);
                $Busqueda->setLongitud($row[7]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
}