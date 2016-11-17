<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& ($_SESSION['tipo']=='usuario estandar'||$_SESSION['tipo']=='administrador'))
  {?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Sistema de Geolocalizacion </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" id="theme-style" href="css/app.css">
      
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    
                    <div class="header-block header-block-buttons">
                        <a href="https://github.com/modularcode/modular-admin-html" class="btn btn-oval btn-sm rounded-s header-btn"> <i class="fa fa-github-alt"></i> View on GitHub </a>
                        
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> <span class="name">
    			        <?php echo $_SESSION['nombre']; ?>
    			    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="login.html"> <i class="fa fa-power-off icon" onclick='cerrar()'></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Geolocalizacion </div>
                        </div>
                        <!--navegador contiene los botones-->
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li class="active">
                                    <a href="index.html"> <i class="fa fa-map-marker"></i> Aplicacion </a>
                                </li>
                                
                            
                            </ul>
                        </nav>
                    </div>
                    
                </aside>
                <div class="sidebar-overlay" id="sidebar-oaverlay"></div>
                <article class="content dashboard-page">
                    
                    <section class="section">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-5" style=" height: 800px;">
                                
                                <h1>Geolocalizacion</h1>
                                <button class="btn btn-primary" onclick="iniciar()">desenrutar</button>
                                <form>
                                    <h4>Buscar por Conductor</h4> 
                                    <div class="form-group">
                                        <label for="Licencia_number">Licencia</label>
                                        <input oninput="Coincidencias()" class="form-control" id="Licencia_number" placeholder="Licencia del conductor">
                                        <table id="sugerenciasPersonas"   cellspacing="0" width="100%"></table>
                                    </div>
                                      <h4>Buscar por Auto</h4>
                                    <div class="form-group">
                                        <label for="placa_number">Placa</label>
                                        <input  oninput="CoincidenciasAutos();" class="form-control" id="placa_number" placeholder="Placa del auto">
                                        <table id="sugerenciasAutos"   cellspacing="0" width="100%"></table>
                                    </div>
                                     <h4>Buscar por fecha</h4>
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
                                        
                                        </div>
                                       
                                    </div>  
                                    <p> agregar espacio</p>                
                                  <button type="button" class="btn btn-info btn-lg" onclick="buscar();">Buscar</button>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7" id="mapa" style=" height: 800px;">

                            </div>
                        </div>
                    </section>
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">  </div>
                    <div class="footer-block author">
                        <ul>
                            <li> created by <a>Edson Lipa Urbina</a> </li>
                            <li> <a>Ruth</a> </li>
                            <li> <a>willy</a> </li>
                            <li> <a>Milagros</a> </li>
                        </ul>
                    </div>
                </footer>
             
            </div>
        </div>
        <!-- Reference block for JS -->
       
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
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
