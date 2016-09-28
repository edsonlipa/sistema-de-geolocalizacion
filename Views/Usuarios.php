
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
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
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
                        <div class="main col-lg-12">
                        <div class="card card-block sameheight-item">
                            <table id="example" class="display" cellspacing="0" width="80%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                             
                                <tbody>

                                <?php
                                    require("../Models/modelo_usuario.php");
                                    $modelousuario= new modelo_usuario();
                                    $usuarios=$modelousuario->getall();

                                    $longitud=count($usuarios);
                                    for($i=0;$i<$longitud;$i++)
                                    {
                                        $a=$i+1;
                                    echo' <tr id="'.$a.'" onclick="mostrar(this.id);">';
                                    echo '<td>'.$usuarios[$i]->getId().'</td>
                                        <td>'.$usuarios[$i]->getNombre().'</td>
                                        <td>'.$usuarios[$i]->getUsuario().'</td>
                                        <td>'.$usuarios[$i]->getPassword().'</td>;
                                        <td>
                                        <ul class="item-actions-list">
                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i>eliminar </a>  
                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> editar</a>
                                        </ul>
                                     </td>';
                                 echo '</tr>';
                                    }
                                 ?>
                            </tbody></table>
                                    
                        </div>
                        </div>
                    </section>
                    <section>
                    <div class="main col-lg-12">
                        <div class="card card-block sameheight-item">
                            <table class="table table-condensed" width="50%" border="1">
                             <tr>
                                 <th>ID</th>
                                 <td id="mostrar_id"></td>
                             </tr>

                             <tr>
                                 <th>Nombre</th>
                                 <td id="mostrar_nombre"></td>
                             </tr>
                             <th>Usuario</th>
                             <td id="mostrar_user"></td>
                             <tr>
                                 <th>Password</th>
                                 <td id="mostrar_password"></td>
                             </tr>

                         </table>
                            
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
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script>
        function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = '../Views/'
            });
        }

    </script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );

        function mostrar(h) {
            document.getElementById("mostrar_id").innerHTML = document.getElementById("example").rows[h].cells[0].innerHTML ;
            document.getElementById("mostrar_nombre").innerHTML = document.getElementById("example").rows[h].cells[1].innerHTML ;
            document.getElementById("mostrar_user").innerHTML = document.getElementById("example").rows[h].cells[2].innerHTML ;
            document.getElementById("mostrar_password").innerHTML = document.getElementById("example").rows[h].cells[3].innerHTML ;              
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
