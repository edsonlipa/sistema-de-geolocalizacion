<?php 
	class usuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function identificar($usuario,$password)
		{
			$pass=sha1($password);//encripta la contrase;a para comparar en la base de datos
			$sql="SELECT * FROM usuarios WHERE usuario='$usuario' && password='$pass'";
			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows > 0) {
				$r=$resulatdos->fetch_array();//combierte a un arreglo el resultado 
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
	
	
?>