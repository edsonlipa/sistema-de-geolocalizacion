<?php
	class conexion
	{
		private $servidor;
		private $usuario;
		private $contraseña;
		private $basedatos;
        private $flag=false;
		public  $conexion;

		public function __construct(){
			$this->servidor   = "localhost";
			$this->usuario	  = "root";
			$this->contraseña = "";
			$this->basedatos  = "geolocalizacion";
            $this->flag=true;

		}

		function conectar(){
			$this->conexion= new mysqli($this->servidor,$this->usuario,$this->contraseña,$this->basedatos);
		}

		function cerrar(){
            if($this->flag==true)
            {
                $this->conexion->close();
            }
		}
	}
	
?>