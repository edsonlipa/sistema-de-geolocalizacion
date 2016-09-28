<?php
require ("../Models/modelo_usuario.php");
				
				$nombres = $_POST["nombres"];
				$usuarios = $_POST["usuarios"];
				$password = $_POST["password"];
				$tipo = $_POST["tipo"];
				$pass=sha1($password);				
				$modusuario=new modelo_usuario();
				$usuario=new obj_usuario();
				
				$usuario->setNombre($nombres);
				$usuario->setUsuario($usuarios);
				$usuario->setPassword($pass);
				$usuario->setTipo($tipo);
								
				/*echo $usuario->getId();
				echo $usuario->getNombre();
				echo $usuario->getUsuario();
				echo $usuario->getPassword();
				echo $usuario->getTipo();*/
				

				if($modusuario->agregarUsuario($usuario))
					echo "exito , agrego un usuario correctamente";
				else echo"error al agregar usuario";
?>