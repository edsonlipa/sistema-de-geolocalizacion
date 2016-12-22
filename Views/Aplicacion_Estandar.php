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
            <div class="app sidebar-fixed" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                        <i class="fa fa-bars"></i>
                        </button> </div>
                    
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
                <aside class="sidebar ">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Geolocalizacion </div>
                        </div>
                        <!--navegador contiene los botones-->
                        <nav class="menu ">
                            <ul class="nav metismenu " id="sidebar-menu">
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
                            <div class="col-xs-12 col-sm-6 col-md-6" id="mapa" style=" height: 800px;">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="title-block">
                                    <h1 class="title">Geolocalizacion</h1>
                                </div>

                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Buscar Auto </h3>
                                    </div>
                                    <form class="form-inline">
                                        <div class="form-group">  <input oninput="CoincidenciasAutos();" type="text" class="form-control" id="placa_number" placeholder="Ingrese Placa del auto"> </div>
                                        <button type="button" class="btn btn-info " onclick="Ubicar_Auto();">Ubicar auto</button>
                                    </form>
                                    <table id="sugerenciasAutos"   cellspacing="0" width="100%"></table>
                                </div>
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Input Groups </h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label class="control-label">Desde</label>
                                            <div class="input-group"> <input id="start_date" type="date" class="form-control" placeholder="Some text here"> <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span> </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group"> <label class="control-label">Hasta</label>
                                            <div class="input-group"> <input id="ending_date" type="date" class="form-control" placeholder="Some text here"> <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span> </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-info btn-lg" onclick="buscar();">Buscar</button>

                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="ql-format-button blockquote-reverse">
                        <button class="btn-info" onclick="descargar_pdf()" ><span class="fa fa-download" ></span> Descargar Informe</button>
                        <p class="title-description">puedes descargar el informe</p>

                    </div>
                    <div id="editor"></div>
                    <div id="content">
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-5 stats-col">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Stats </h4>

                                        </div>
                                        <div id="report-header" class="row row-sm stats-container">
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-calendar-o"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_F-actual">  </div>

                                                    <div class="name"> Fecha - Actual </div>
                                                </div> <progress class="progress stat-progress" value="34" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 34%;"></span>
                                                    </div>
                                                </progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-car"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_placa">  </div>
                                                    <div class="name"> placa </div>
                                                </div> <progress class="progress stat-progress" value="60" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 60%;"></span>
                                                    </div>
                                                </progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-calendar"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_F-inicio">  </div>
                                                    <div class="name"> Fecha inicial de busqueda </div>
                                                </div> <progress class="progress stat-progress" value="34" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 34%;"></span>
                                                    </div>
                                                </progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-calendar"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_F-final">  </div>
                                                    <div class="name"> Fecha final de busqueda </div>
                                                </div> <progress class="progress stat-progress" value="34" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 34%;"></span>
                                                    </div>
                                                </progress> </div>
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-map-marker"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_N-trakeos">  </div>
                                                    <div class="name"> trakeos encontrados </div>
                                                </div> <progress class="progress stat-progress" value="75" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 75%;"></span>
                                                    </div>
                                                </progress> </div>
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-male"></i> </div>
                                                <div class="stat">
                                                    <div class="value" id="report_C-actuales">  </div>
                                                    <div class="name"> conductores actuales </div>
                                                </div> <progress class="progress stat-progress" value="25" max="100">
                                                    <div class="progress">
                                                        <span class="progress-bar" style="width: 25%;"></span>
                                                    </div>
                                                </progress> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-7 history-col">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Conductores Actuales </h3>
                                        </div>
                                        <section class="example">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Licencia</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Celular</th>
                                                </tr>
                                                </thead>
                                                <tbody id="conductores_actuales">
                                                </tbody>
                                            </table>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <!---------------------------------- informe ultima ubicacion------------------------------------>
                        <div class="card items">
                            <div class="card-header bordered">
                                <div class="header-block">
                                    <h3 class="title" id="ubi-title"> Ultima Ubicacion al:  </h3>
                                </div>
                            </div>
                            <ul class="item-list striped">
                                <li class="item item-list-header hidden-sm-down">
                                    <div class="item-row">
                                        <div class="item-col item-col-header fixed item-col-img md">
                                            <div> <span>Media</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-title">
                                            <div> <span>Nombre</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-sales">
                                            <div> <span>Placa</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-stats">
                                            <div class="no-overflow"> <span>Marca</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-category">
                                            <div class="no-overflow"> <span>Color</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-author">
                                            <div class="no-overflow"> <span>Fecha</span> </div>
                                        </div>
                                        <div class="item-col item-col-header item-col-date">
                                            <div> <span>Hora</span> </div>
                                        </div>

                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-row">

                                        <div class="item-col fixed item-col-img md">
                                            <a >
                                                <div class="item-img rounded" id="Ubi-imagen"  ></div>
                                            </a>
                                        </div>
                                        <div class="item-col   item-col-title">
                                            <div class="item-heading">Nombre</div>
                                            <div>
                                                <a>
                                                    <h4 class="item-title" id="Ubi-lugar"> </h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item-col item-col-sales">
                                            <div class="item-heading" >Placa</div>
                                            <div id="Ubi-placa">  </div>
                                        </div>
                                        <div class="item-col item-col-stats no-overflow">
                                            <div class="item-heading">Marca</div>
                                            <div class="no-overflow">
                                                <div class="item-stats"  id="Ubi-marca"></div>
                                            </div>
                                        </div>
                                        <div class="item-col item-col-category no-overflow">
                                            <div class="item-heading">Color</div>
                                            <div class="no-overflow" id="Ubi-color"> <a ></a> </div>
                                        </div>
                                        <div class="item-col item-col-author">
                                            <div class="item-heading">Fecha</div>
                                            <div class="no-overflow" > <a id="Ubi-fecha"></a> </div>
                                        </div>
                                        <div class="item-col item-col-date">
                                            <div class="item-heading">Hora</div>
                                            <div class="no-overflow" >  <a id="Ubi-hora"></a></div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-------------------------------informe trakeos--------------------------------------->
                        <div class="row sameheight-container">
                            <div class="col-xl-12" >
                                <div class="card sameheight-item items" data-exclude="xs,sm,lg">
                                    <div class="card-header bordered">
                                        <div class="header-block">
                                            <h3 class="title"> Trakeos </h3>
                                        </div>

                                    </div>

                                    <ul class="item-list striped" id="container-trakeos">
                                        <li class="item item-list-header hidden-sm-down">
                                            <div class="item-row">

                                                <div class="item-col item-col-header item-col-title">
                                                    <div> <span>Nombre </span> </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-title">
                                                    <div> <span>Codigo</span> </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-stats">
                                                    <div class="no-overflow"> <span>Fecha</span> </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-date">
                                                    <div> <span>Hora</span> </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">

                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <h4 class="item-title no-wrap"> </h4>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-title">
                                                    <div>  </div>
                                                </div>
                                                <div class="item-col item-col-stats">

                                                    <div class="no-overflow">
                                                        <div class="item-stats" > </div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div> </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!---------aqui aumenta segun traqueos--------->
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </section>
                    </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD192AY4NxJxc8m55g4hrWzSAVVd6_XXf4&signed_in=true&callback=iniciar"></script>
        <script src="../Resources/js/indexmap.js?5"></script>
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
