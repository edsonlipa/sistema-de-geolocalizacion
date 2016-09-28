<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
{?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
        <script src="../Resources/js/jquery-1.11.2.js"></script>
        <script src="../Resources/js/bootstrap.min.js"></script>
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
                        <small>Registro de Personas</small>
                    </h1>
                    <hr class="fx-line">

                    <div class="panel">

                        <div class="form-group">
                            <label for="ap" class="col-lg-2 control-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="ap" id="ap" placeholder="Apellido Paterno" style="width:330px;" required>
                        </div>

                        <div class="form-group">
                            <label for="am" class="col-lg-2 control-label">Apellido Materno:</label>
                            <input type="text" class="form-control" name="am" id="am" placeholder="Apellido Materno" style="width:330px;" required>
                        </div>

                        <div class="form-group" >
                            <label for="nombre" class="col-lg-2 control-label">Nombre :</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" style="width:330px;" required>
                        </div>


                        <div class="form-group">
                            <label for="licencia" class="col-lg-2 control-label">Licencia :</label>
                            <input type="text" class="form-control" name="licencia" id="licencia" placeholder="Número de documento" style="width:330px;" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-lg-2 control-label">Direccion :</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" style="width:330px;" required>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="col-lg-2 control-label">Celular :</label>
                            <input type="text" class="form-control" name="celular" id="celular" placeholder="Número de celular" style="width:330px;" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Correo eléctronico:</label>
                            <input type="email"  class="form-control" name="email" id="email" style="width:330px;" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-lg-2 control-label">Imagen</label>
                            <select class="form-control" style="width:330px;"  name="rol" id="rol" required>

                            </select>
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
    </body>
    </html>
    <?php

}
else
{
    header("location: ./");
}
?>

