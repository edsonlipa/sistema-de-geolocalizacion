<?php
require ("../Models/modelo_auto.php");
				$placa = $_POST["placa"];
				$codicono = $_POST["codicono"];
				$color = $_POST["color"];
				$foto = $_POST["foto"];
				$marca = $_POST["marca"];

				$modauto=new modelo_auto();
				$auto=new obj_auto();
				$auto->setPlaca($placa);
				$auto->setCodicono($codicono);
				$auto->setColor($color);
				$auto->setFoto($foto);
				$auto->setMarca($marca);

				//echo $auto->getPlaca();
				//echo $auto->getCodicono();
				//echo $auto->getColor();
				//echo $auto->getFoto();
				//echo $auto->getMarca();


if($modauto->agregarAuto($auto))
    echo "exito , se agrego un nuevo auto";
else echo"error al agregar un auto";
?>