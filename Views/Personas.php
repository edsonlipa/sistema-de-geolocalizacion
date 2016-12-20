
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
                            <table id="example"  class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Licencia</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo Electronico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Licencia</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo Electronico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php
                                     require("../Models/modelo_persona.php");
                                    // require_once("funciones.php");

                                     $modelopersona=new modelo_persona();
                                     $personas=$modelopersona->getAll();

                                     //saco el numero de elementos
                                    $longitud = count($personas);
                                    //Recorro todos los elementos
                                    for($i=0; $i<$longitud; $i++)
                                      {
                                      //saco el valor de cada element
                                      $a=$i+1;
                                    echo ' <tr id="'.$a.'" onclick="mostrar(this.id);">';
                                    echo'<td id="licenia '.$i.'" onclick="mostrkjar(this.id);">'.$personas[$i]->getLicencia().'</td>
                                         <td id="nombre'.$i.'">'.$personas[$i]->getNombre().'</td>
                                         <td>'.$personas[$i]->getApellido().'</td>
                                         <td>'.$personas[$i]->getEmail().'</td>
                                         <td>
                                         <ul class="item-actions-list">
                                                <a class="remove" id="'.$a.'" data-toggle="modal" data-target="#confirm-modal" onclick="eliminar(this.id);"> <i class="fa fa-trash-o "></i>eliminar </a>
                                                <a class="edit" id="editar'.$i.'"> <i class="fa fa-pencil"></i> editar</a>
                                             </ul>
                                        </td>';

                                     echo '</tr>';}
                                     ?>
                                </tbody>
                            </table>





                        </div>
                        </div>
                    </section>
                    <section>
                    <div class="main col-lg-12">
                        <div class="card card-block sameheight-item">
                            <table  class="table table-condensed" width="100%" >
                                <thead>
                                <tr>
                                    <td rowspan="6" id="mostrar_imagen"></td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td id="mostrar_nombre"></td>
                                </tr>
                                <tr>
                                    <th>Apellido</th>
                                    <td id="mostrar_apellido"></td>
                                </tr>
                                <tr>
                                    <th>Nº Licencia</th>
                                    <td id="mostrar_licencia"></td>
                                </tr>
                                    <th>Direccion</th>
                                    <td id="mostrar_direccion"></td>
                                <tr>
                                    <th>Celular</th>
                                    <td id="mostrar_celular"></td>
                                </tr>
                                <tr>
                                    <th>Correo Eletronico</th>
                                    <td id="mostrar_email"></td>
                                </tr>
                            </table>
                            </div>
                          </div>
                    </section>
                    <section class="col-lg-6">
                    <div class="main col-lg-12">
                        <div class="card card-block sameheight-item">
                          <h3>autos en posecion:<button>add</button></h3>
                            <table  class="table table-condensed" width="100%" >
                              <thead>
                              <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>asd-654</td>
                                <td>hymday</td>
                                <td>grand</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                              <tr>
                                <td>Mary</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                              <tr>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                            </tbody>
                            </table>

                            </div>
                          </div>
                    </section>
                    <section class="col-lg-6">
                    <div class="main col-lg-12">
                        <div class="card card-block sameheight-item">
                          <h3>conduciendo actualmente:<button>add</button></h3>
                            <table  class="table table-condensed" width="100%" >
                              <thead>
                              <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>asd-654</td>
                                <td>hymday</td>
                                <td>grand</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                              <tr>
                                <td>Mary</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                              <tr>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                                <td>plata</td>
                                <td>editar eliminar</td>
                              </tr>
                            </tbody>
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
             var licencia = document.getElementById("example").rows[h].cells[0].innerHTML ;
             $.ajax({
                url:'../Controllers/buscar_persona.php',
                type:'POST',
                data:"licencia="+licencia
            }).done(function(resp){

                document.getElementById("mostrar_imagen").innerHTML =" <img src='../Resources/img/"+resp.foto+" ' width='250px' height='250px' >";
                document.getElementById("mostrar_nombre").innerHTML = resp.nombre;
                document.getElementById("mostrar_licencia").innerHTML = resp.licencia;
                document.getElementById("mostrar_apellido").innerHTML = resp.apellido ;
                document.getElementById("mostrar_direccion").innerHTML = resp.celulars ;
                document.getElementById("mostrar_celular").innerHTML = resp.direccion ;
                document.getElementById("mostrar_email").innerHTML = resp.email ;
                }
            )

        }
        function eliminar(h){
                var licencia = document.getElementById("example").rows[h].cells[0].innerHTML ;

               if (confirm("¿seguro que desea eliminar un registro?")) {
                    $.ajax({
                    url:'../Controllers/eliminar_persona.php',
                    type:'POST',
                    data:"licencia="+licencia
                    }).done(function(resp){
                        alert(resp);
                        }
                    )
               }
               else{

               }
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
