<?php
require("../Templates/obj_trakeo.php");
require("conexion.php");
class modelo_trakeo
{
    private $obj_conexion;

    function __construct()
    {
        $this->obj_conexion = new conexion();
    }

    public function getUbicationByPlaca($placa)
    {   $this->obj_conexion->conectar();
        $sql="select auto.placa,
                    auto.marca,
                    auto.color,
                    auto.foto,
                    lugar.id,
                    lugar.nomLugar,
                    lugar.codLugar,
                    lugar.latitud,
                    lugar.longitud,
                    trakeo.fecha,
                    trakeo.hora,
                    trakeo.velocidad,
                    auto.codicono 
              from auto inner join trakeo on auto.placa=trakeo.placa 
              inner join lugar on trakeo.codLugar=lugar.id WHERE trakeo.placa='$placa'ORDER BY trakeo.fecha,trakeo.hora DESC LIMIT 1;";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows==1)
        {

            $row = mysqli_fetch_array($result);
            $Busqueda=new obj_trakeo();
            $Busqueda->setPlaca($row[0]);
            $Busqueda->setMarca($row[1]);
            $Busqueda->setColor($row[2]);
            $Busqueda->setFoto($row[3]);
            $Busqueda->setIdLugar($row[4]);
            $Busqueda->setNomLugar($row[5]);
            $Busqueda->setCodLugar($row[6]);
            $Busqueda->setLatitud($row[7]);
            $Busqueda->setLongitud($row[8]);
            $Busqueda->setFecha($row[9]);
            $Busqueda->setHora($row[10]);
            $Busqueda->setVelocidad($row[11]);
            $Busqueda->setCodicono($row[12]);

            return $Busqueda;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }
    public function getBusquedaBy_PlacaBetweenFech($placa,$start_date,$ending_date)
    {
        $this->obj_conexion->conectar();
        $sql="select auto.placa,
                auto.marca,
                auto.color,
                auto.foto,
                lugar.id,
                lugar.nomLugar,
                lugar.codLugar,
                lugar.latitud,
                lugar.longitud,
                trakeo.fecha,
                trakeo.hora,
                trakeo.velocidad,
                auto.codicono
                from auto inner join trakeo on auto.placa=trakeo.placa 
              inner join lugar on trakeo.codLugar=lugar.id WHERE trakeo.placa='$placa'and trakeo.fecha BETWEEN '$start_date'AND '$ending_date';";
        $result=$this->obj_conexion->conexion->query($sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
        {
            $Busquedas=array();
            while($row = mysqli_fetch_array($result))
            {
                $Busqueda=new obj_trakeo();
                $Busqueda->setPlaca($row[0]);
                $Busqueda->setMarca($row[1]);
                $Busqueda->setColor($row[2]);
                $Busqueda->setFoto($row[3]);
                $Busqueda->setIdLugar($row[4]);
                $Busqueda->setNomLugar($row[5]);
                $Busqueda->setCodLugar($row[6]);
                $Busqueda->setLatitud($row[7]);
                $Busqueda->setLongitud($row[8]);
                $Busqueda->setFecha($row[9]);
                $Busqueda->setHora($row[10]);
                $Busqueda->setVelocidad($row[11]);
                $Busqueda->setCodicono($row[12]);
                $Busquedas[]=$Busqueda;
            }
            return $Busquedas;
        }
        else{
            return 0;
        }
        $this->obj_conexion->cerrar();
    }

    public function getObjConexion()
    {

    }
    public function getAll(){
        $this->obj_conexion->conectar();

        $sql="select auto.placa,
                auto.marca,
                auto.color,
                auto.foto,
                lugar.id,
                lugar.nomLugar,
                lugar.codLugar,
                lugar.latitud,
                lugar.longitud,
                trakeo.fecha,
                trakeo.hora,
                trakeo.velocidad,
                auto.codicono
                from auto inner join trakeo on auto.placa=trakeo.placa 
              inner join lugar on trakeo.codLugar=lugar.id WHERE 1";
        $result= $this->obj_conexion->conexion->query($sql);
        if($result){
                $Busquedas=array();
                while($row = mysqli_fetch_array($result))
                {
                    $Busqueda=new obj_trakeo();
                    $Busqueda->setPlaca($row[0]);
                    $Busqueda->setMarca($row[1]);
                    $Busqueda->setColor($row[2]);
                    $Busqueda->setFoto($row[3]);
                    $Busqueda->setIdLugar($row[4]);
                    $Busqueda->setNomLugar($row[5]);
                    $Busqueda->setCodLugar($row[6]);
                    $Busqueda->setLatitud($row[7]);
                    $Busqueda->setLongitud($row[8]);
                    $Busqueda->setFecha($row[9]);
                    $Busqueda->setHora($row[10]);
                    $Busqueda->setVelocidad($row[11]);
                    $Busqueda->setCodicono($row[12]);
                    $Busquedas[]=$Busqueda;
                }
                return $Busquedas;        }
        else{
            return 0;
            echo 'no hay resultados';
        }
    }

}