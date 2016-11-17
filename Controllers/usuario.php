<?php
		require_once('../Models/usuario.php');
		$boton=$_POST['boton'];
		
		if ($boton=='cerrar') 
		{
			
			session_start();
			session_unset();
			session_destroy();
			echo "se cerrar la conexion";
		}
		else
		{
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
				$_SESSION['tipo']=$array[7];

				echo $array[7];

			}
		}

?>