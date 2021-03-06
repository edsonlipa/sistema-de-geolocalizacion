<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& ($_SESSION['tipo']=='usuario estandar'||$_SESSION['tipo']=='administrador'))
  {?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>geolocalizacion</title>

    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">

</head>
 
<body>
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Sistema de Geolocalizacion</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><!-- <span class="glyphicon glyphicon-user">…</span> -->
                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombre']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar()'>Cerrar Session</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5" style=" height: 800px;">
                <button class="btn btn-primary" onclick="iniciar()">desenrutar</button>
                <h1>Geolocalizacion</h1>
                <form>
                    <input type="checkbox"> Buscar por Conductor
                    <div class="form-group">
                        <label for="Licencia_number">Licencia</label>
                        <input oninput="Coincidencias()" class="form-control" id="Licencia_number" placeholder="Licencia del conductor">
                        <table id="sugerenciasPersonas"   cellspacing="0" width="100%"></table>
                    </div>
                     <input type="checkbox"> Buscar por Auto
                    <div class="form-group">
                        <label for="placa_number">Placa</label>
                        <input  oninput="CoincidenciasAutos();" class="form-control" id="placa_number" placeholder="Placa del auto">
                        <table id="sugerenciasAutos"   cellspacing="0" width="100%"></table>
                    </div>
                    <input type="checkbox"> buscar por fecha
                    <!-- busqueda por fecha -->
                    <div class="form-group">
                        
                        <div class="col-xs-12 col-sm-6 col-md-6"  >
                            <label for="start_date">desde</label>
                            <div class='input-group date'>
                                <input type="date" class="form-control" id="start_date" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                            <!-- <div class='input-group time'>
                                <input type="time" class="form-control" id="start_time" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div> -->
                        </div>
                        <!-- ************************************** -->
                        <div class="col-xs-12 col-sm-6 col-md-6"  >
                            <label for="end_date">hasta</label>
                            <div class='input-group date' >
                                <input type='date' class="form-control " id="ending_date"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <!-- <div class='input-group time'>
                                <input type="time" class="form-control" id="end_time" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div> -->
                        </div>
                       
                    </div>  
                    <p> agregar espacio</p>                
                  <button type="button" class="btn btn-info btn-lg" onclick="buscar();">Buscar</button>
                </form>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7" id="mapa" style=" height: 800px;">

            </div>
        </div>
    </div>
    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD192AY4NxJxc8m55g4hrWzSAVVd6_XXf4&signed_in=true&callback=iniciar"></script>
    <script src="../Resources/js/indexmap.js"></script>
    <script src="../Resources/js/map_function.js"></script>

</body>
</html>

<?php

  }
  else
  {
    header("location: ./");
  }
 ?>
    