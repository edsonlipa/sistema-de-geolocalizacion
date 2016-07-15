<?php
		require_once('../Models/usuario.php');
		$boton=$_POST['boton'];
		if ($boton=='cerrar') 
		{
			echo "se cerrar la conexion";
			session_start();
			session_destroy();
			
		}
		else
		{
			echo "entre";
			$usuario=$_POST['usuario'];
			$password=$_POST['password'];
			
			$ins = new usuario();
			$array=$ins->identificar($usuario,$password);
			if ($array[0]==0) {
				echo "el usuario o contrase;a son erroneos";
			}
			else{
				session_start();
				$_SESSION['ingreso']='YES';
				$_SESSION['nombre']=$array[1];
				$_SESSION['tipo']=$array[4];

				echo $array[4];

			}
		}

?>