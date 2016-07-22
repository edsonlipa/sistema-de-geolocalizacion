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
    <title>Aplicacion Web</title>

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
            <a href="#" class="navbar-brand">AplicacionWeb</a>
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
                <button class="btn btn-primary" onclick="marcador()">poner marcador</button>
                <button class="btn btn-primary" onclick="enrutar()">enrutar</button>
                <h1>Geolocalizacion</h1>
                <form>
                    <input type="checkbox"> Buscar por Conductor
                    <div class="form-group">
                        <label for="person_name">busar por nombre</label>
                        <input  class="form-control" id="person_name" placeholder="nombre">
                    </div>
                     <input type="checkbox"> Buscar por Auto
                    <div class="form-group">
                        <label for="placa_number">Placa</label>
                        <input  class="form-control" id="placa_number" placeholder="Placa del auto">
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
                                <input type='date' class="form-control " id="end_date"/>
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
                  <button type="button" class="btn btn-info btn-lg">Buscar</button>
                </form>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7" id="mapa" style=" height: 800px;">

            </div>
        </div>
    </div>
    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD192AY4NxJxc8m55g4hrWzSAVVd6_XXf4&callback=iniciar"></script>
    <script>
        function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                
                location.href = '../Views/login.html';
            });
        }
    </script>
    <script type="text/javascript">
        
        var map;
        var myCenter
        var myCenter1
        var myCenter2
        function iniciar() {
        myCenter=new google.maps.LatLng(-16.4045861,-71.5311351);
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: myCenter,
            zoom: 15
        });
        }
        function marcador(){
            myCenter1=new google.maps.LatLng(-16.406285, -71.524262);
            var marker=new google.maps.Marker({
            position:myCenter1
             });
              marker.setMap(map);
            
            myCenter2=new google.maps.LatLng(-16.404865, -71.532315);
            var marker1=new google.maps.Marker({
                position:myCenter2
            });
            marker1.setMap(map);
        }

        function enrutar() {
            myCenter1=new google.maps.LatLng(-16.406285, -71.524262);
            myCenter2=new google.maps.LatLng(-16.404865, -71.532315);
            var objConfigDR
                = {
                origin:map
            };
            var objConfigDS = {
                origin:'Lambramani 112, Arequipa',
                destination:'Paucarpata 302, Arequipa',
                travelMode: google.maps.TravelMode.DRIVING
            };
            var directionsService = new google.maps.DirectionsService();
            var directionsRender = new google.maps.DirectionsRenderer(objConfigDR);

            directionsService.route(objConfigDS, function(resultado, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsRender.setDirections(resultado);
                    alert('exito');
                }
                else{
                    alert('error'+status);
                }
            });
        }
    </script>
</body>
</html>

<?php

  }
  else
  {
    header("location: ./");
  }
 ?>
    