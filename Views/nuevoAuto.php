
<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
  {?>
    <!doctype html>
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
                        <?php
                        include_once "navigator.php";
                        ?>
                    </div>
                    
                </aside>
                <div class="sidebar-overlay" id="sidebar-oaverlay"></div>
                
                <article class="content dashboard-page">
                    
                    <section class="section">

                        <div class="container">
                                    <div class="row">
                                        <div class="main col-lg-12">
                                        <div class="card card-block sameheight-item">
                                            <h1 class="page-header">
                                                <small>Registro de Autos</small>
                                            </h1>
                                            <div class="subtitle-block">
                                                <h3 class="subtitle">
                                                Agregar Auto
                                            </h3>
                                            <hr class="fx-line">

                                            <div class="panel">

                            <div class="form-group" >
                                <label for="placa" class="col-lg-2 control-label">Placa:</label>
                                <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa" style="width:330px;" required>
                            </div>

                            <div class="form-group">
                                <label for="codicono" class="col-lg-2 control-label">Codigo de Icono:</label>
                                <input type="text" class="form-control" name="codicono" id="codicono" placeholder="Codicono" style="width:330px;" required>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-lg-2 control-label">Color:</label>
                                <input type="text" class="form-control" name="color" id="color" placeholder="Color" style="width:330px;" required>
                            </div>
                            <div class="form-group">
                                <label for="marca" class="col-lg-2 control-label">Marca:</label>
                                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" style="width:330px;" required>
                            </div>
                            <div class="form-group">
                                <label for="imagen" class="col-lg-2 control-label">Imagen: </label>
                                <input class="inputFile " type='file' id='foto' name='foto' ><br>
                                            
                            </div>

                            <p class="login-submit">
                                <button type="button" class="btn btn-success" style="margin-left:265px;"onClick="crear();">Entrar</button>
                            </p>
                        
                    </div>
                                        </div>
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
       
        <script src="../Resources/js/vendor.js"></script>
        <script src="../Resources/js/app.js"></script>
        <script>
        function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = '../Views/login.html'
            });
        }
        function subir() {
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
                    
                }
            });

        };
        function crear() {

            var placa =$('#placa').val();
            var codicono =$('#codicono').val();
            var color =$('#color').val();
            var foto = $('#foto').val().split("\\")[2];
            var marca =$('#marca').val();
            //var imagen ='/ficheros/'+$('#imagen').val();
            
            if (foto&&placa&&codicono&&color&&marca) {   
                $.ajax({
            url:'../Controllers/crear_auto.php',
            type:'POST',
            data:'placa='+placa+'&codicono='+codicono+"&color="+color+"&foto="+foto+'&marca='+marca
            }).done(function(resp){
            alert(resp);
                if (resp=="exito , se agrego un nuevo auto") {
                    subir();
                    location.href='../Views/nuevoAuto.php';
                }
            })
            }
             else{
                alert("hay campos vacios, todos los campos son necesarios");
             }   
         };
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
