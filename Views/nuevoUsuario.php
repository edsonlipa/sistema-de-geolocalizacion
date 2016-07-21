
<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
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

        <?php
        include_once "navigator.php";

        ?>

        <div id="page-content-wrapper" style="width:75%;float:right;margin-top:5%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="main col-lg-12">
                        <h1 class="page-header">
                            <small>Registro de usuarios</small>
                        </h1>
                        <hr class="fx-line">

                        <div class="panel">
                            <form method="post" role="form" action="../../funciones/crearUsuario.php" class="login" >
                                <div class="form-group" >
                                    <label for="id" class="col-lg-2 control-label">ID:</label>
                                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" style="width:330px;" required>
                                </div>

                                <div class="form-group">
                                    <label for="nombres" class="col-lg-2 control-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre" style="width:330px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="usuarios" class="col-lg-2 control-label">Usuario:</label>
                                    <input type="text" class="form-control" name="usuarios" id="usuarios" placeholder="Usuario" style="width:330px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-2 control-label">Contraseña:</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="width:330px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipo" class="col-lg-2 control-label">Tipo:</label>
                                    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="tipo" style="width:330px;" required>
                                </div>

                                <p class="login-submit">
                                    <button type="submit" class="btn btn-success" style="margin-left:265px;">Entrar</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
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

    </body>
    </html>

    <?php

}
else
{
    header("location: ./");
}
?>
