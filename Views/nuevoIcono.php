<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
{?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">

        <title>Admin</title>

    </head>

    <body>

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
    <?php
    include_once "navigator.php";

    ?>

    <div id="page-content-wrapper" style="width:75%;float:right;margin-top:5%;">
        <div class="container-fluid">
            <div class="row">
                <div class="main col-lg-12">
                    <h1 class="page-header">
                        <small>Registro de Iconos</small>
                    </h1>
                    <hr class="fx-line">

                    <div class="panel">

                        <div class="form-group" >
                            <label for="desicono" class="col-lg-2 control-label">Descripcion de icono :</label>
                            <input type="text" class="form-control" name="desicono" id="desicono" placeholder="desicono" style="width:330px;" required>
                        </div>

                        <div class="form-group">
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
                                <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

                            </head>
                            <body>
                            <header>
                                Imagen :
                            </header>
                            <section id="mainContent" class="mainContent">

                                <div class="formularioImagen">
                                    <form action='recogerFichero.php' method='POST' enctype='multipart/form-data' target='_blanck' >
                                        <input class="inputFile" type='file' id='imagen' name='imagen' ><br>
                                        <button type="button" class="btn btn-success" style="margin-left:265px;" onclick="prueba();">subir</button>
                                    </form>
                                </div>

                            </section>
                            </body>
                            </html>
                        </div>
                        <p class="login-submit">
                            <button type="button" class="btn btn-success" style="margin-left:265px;" onclick="crear();">Crear</button>
                        </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../Resources/js/jquery-1.11.2.js"></script>
        <script src="../Resources/js/bootstrap.min.js"></script>
        <script>
            function prueba() {
                var file_data = $("#imagen").prop("files")[0];
                var form_data = new FormData();
                form_data.append("file", file_data)

                $.ajax({
                    url: "recogerFichero.php",
                    dataType: 'script',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(){
                        alert("imagen subida");
                    }
                });

            };
            function crear() {
                var codicono =$('#codicono').val();
                var desicono =$('#desicono').val();
                var imagen = "/img/" + $('#imagen').val().split("\\")[2];



                $.ajax({
                    url:'../Controllers/crear_icono.php',
                    type:'POST',
                    data:'desicono='+desicono+'&imagen='+imagen
                }).done(function(resp){
                    alert(resp);

                })};
        </script>
    </div>
    </body>
    </html>
    <?php

}
else
{
    header("location: ./");
}
?>