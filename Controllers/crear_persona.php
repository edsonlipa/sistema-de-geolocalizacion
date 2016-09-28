<?php
require ("../Models/modelo_persona.php");
				$nombre = $_POST["nombre"];
				$apellido = $_POST["apellido"];
				$email = $_POST["email"];
				$imagen = $_POST["imagen"];
				$celular = $_POST["celular"];
				$direccion = $_POST["direccion"];
				$licencia = $_POST["licencia"];
				
				$modpersona=new modelo_persona();
				$persona=new obj_persona();
				$persona->setLicencia($licencia);
				$persona->setNombre($nombre);
				$persona->setApellido($apellido);
				$persona->setDireccion($direccion);
				$persona->setCelular($celular);
				$persona->setEmail($email);
				$persona->setFoto($imagen);
				
				//echo $persona->getLicencia();
				//echo $persona->getNombre();
				//echo $persona->getApellido();
				//echo $persona->getDireccion();
				//echo $persona->getCelular();
				//echo $persona->getEmail();
				//echo $persona->getFoto();

				if($modpersona->agregarPersona($persona))
					echo "exito , agrego una persona correctamente";
				else echo"error al agregar persona";
?>