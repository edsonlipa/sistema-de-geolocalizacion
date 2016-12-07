<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
{?>
<!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="../Resources/css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" id="theme-style" href="../Resources/css/app.css">
    </head>

    <body>
    <div class="main-wrapper">
        <div class="app" id="app">
            <header class="header">
                <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                        <i class="fa fa-bars"></i>
                    </button> </div><h3>Administracion de lugares</h3>
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
                    <?php
                    include_once "navigator.php";
                    ?>
                </div>

            </aside>

            <div class="sidebar-overlay" id="sidebar-oaverlay"></div>

            <article class="content dashboard-page">
                <div class="alert alert-success" id="alert-success" style="display:none;">
                    <strong>Success!</strong> This alert box could indicate a successful or positive action.
                </div>
                <section class="section">

                    <button class="btn btn-primary" onclick="retornar_lugares()">Mostrar lugares existentes</button>
                    <button class="btn btn-primary" onclick="">Eliminar lugar </button>
                    <button class="btn btn-primary" onclick="iniciar()">Limpiar mapa</button>
                    <div class="row">

                        <div class="col-xs-12 col-sm-7 col-md-7" id="mapa" style=" height: 800px;">
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5" style=" height: 800px;">

                            <button type="button" class="btn btn-info btn-lg" onclick="esperar();">agregar marcador</button>

                        </div>


                    </div>
                </section>
            </article>
            <div class="modal fade" id="lugarModal" tabindex="-1" role="dialog" aria-labelledby="lugarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>

                            </button>

                            <h4 class="modal-title" id="lugarModalLabel">Agregar un nuevo Lugar</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning" id="warning_agregar" style="display:none;">
                                <strong>Advertencia!</strong> Todos los campos son necesarios.
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="Latitud" class="col-lg-3 control-label">Latitud:</label>
                                    <input type="text" class="form-control" name="Latitud" id="Latitud" placeholder="Latitud" style="width:330px;" disabled required>
                                </div>
                                <div class="form-group">
                                    <label for="Longitud" class="col-lg-3 control-label">Longitud:</label>
                                    <input type="text" class="form-control" name="Longitud" id="Longitud" placeholder="Longitud" style="width:330px;" disabled required>
                                </div>
                                <div class="form-group">
                                    <label for="codLugar" class="col-lg-3 control-label">Codigo Lugar:</label>
                                    <input type="text" class="form-control" name="codLugar" id="codLugar" placeholder="codLugar" style="width:330px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nombre" class="col-lg-3 control-label">Nombre:</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre   " style="width:330px;" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"  onclick="cancel_marker()" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="crear_lugar()">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="EditarlugarModal" tabindex="-1" role="dialog" aria-labelledby="EditarlugarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>

                            </button>

                            <h4 class="modal-title" id="EditarlugarModalLabel">Actualizar Lugar</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning" id="warning_actualizar" style="display:none;">
                                <strong>Advertencia!</strong> no puede editar con campos en blanco.
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="Latitud" class="col-lg-3 control-label">Latitud:</label>
                                    <input type="text" class="form-control" name="Latitud" id="EditarLatitud" placeholder="Latitud" style="width:330px;" disabled required>
                                </div>
                                <div class="form-group">
                                    <label for="Longitud" class="col-lg-3 control-label">Longitud:</label>
                                    <input type="text" class="form-control" name="Longitud" id="EditarLongitud" placeholder="Longitud" style="width:330px;" disabled required>
                                </div>
                                <div class="form-group">
                                    <label for="codLugar" class="col-lg-3 control-label">Codigo Lugar:</label>
                                    <input type="text" class="form-control" name="codLugar" id="EditarcodLugar" placeholder="codLugar" style="width:330px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nombre" class="col-lg-3 control-label">Nombre:</label>
                                    <input type="text" class="form-control" name="Nombre" id="EditarNombre" placeholder="Nombre   " style="width:330px;" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="editar_lugar()">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>


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

    <script src="../Resources/js/vendor.js"></script>
    <script src="../Resources/js/app.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD192AY4NxJxc8m55g4hrWzSAVVd6_XXf4&signed_in=true&callback=iniciar"></script>
    <script src="../Resources/js/indexmap.js?1.0.1"></script>
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
