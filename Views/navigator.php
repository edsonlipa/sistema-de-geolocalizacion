
<?php
//session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
{?>

		<div id="wrapper" style="width:20%;margin-top:60px;display:inline-block;">
			<div id="sidebar-wrapper" class="sidebar">
				<ul class="nav nav-sidebar" style="height:630px;">

					<li class="first"><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>

					<li class="submenu-header">
						<a href="nuevaPersona.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Persona</a></li>
					</li>

					<li class="submenu-header">
						<a href="nuevolugar.php"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>Lugar</a>
					</li>

					<li class="submenu-header">
						<a href="nuevoAuto.php"><span class="glyphicon glyphicon-road" aria-hidden="true"></span>Auto</a>
					</li>

					<li class="submenu-header active">
						<a href="nuevoUsuario.php" <span class="glyphicon glyphicon-list" aria-hidden="true"></span>	Usuarios</a>

					</li>
					<li class="first"><a href=""><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>Icono</a></li>
				</ul>
			</div>
		</div>



	<?php

}
else
{
	header("location: ./");
}
?>
