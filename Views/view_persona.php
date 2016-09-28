<?php

//require_once ("recogerFichero.php");
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'&& $_SESSION['tipo']=='administrador')
{?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <script src = "js/index.js" ></script>
        <link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
        <link rel = "stylesheet" href = "css/index.css" />

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
        <table id="example"  class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Licencia</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Correo Electronico</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Licencia</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Correo Electronico</th>
                <th>Foto</th>
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
         <td>'.$personas[$i]->getCelular().'</td>
         <td>'.$personas[$i]->getDireccion().'</td>
         <td>'.$personas[$i]->getEmail().'</td>
         <td>'.$personas[$i]->getFoto().'</td>
         <td>
		 <button type="submit"
                value="Editar"
                id="evento_editar"
                name="evento_editar" onclick ="" >editar</button> 
		<i type="submit"
                value="Aceptar"
                id="evento_aceptar"
                name="evento_aceptar" />
         <input type="submit"
                value="Eliminar"
                id="evento_eliminar"
                name="evento_eliminar" />
		</td>';
                echo '</tr>';}
            ?>

            <table  class="table table-condensed" width="50%" border="1">
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
            </tbody>

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
                    document.getElementById("mostrar_imagen").innerHTML =" <img src='../Resources/img/"+document.getElementById("example").rows[h].cells[6].innerHTML+" ' >";
                    document.getElementById("mostrar_nombre").innerHTML = document.getElementById("example").rows[h].cells[1].innerHTML ;
                    document.getElementById("mostrar_apellido").innerHTML = document.getElementById("example").rows[h].cells[2].innerHTML ;
                    document.getElementById("mostrar_direccion").innerHTML = document.getElementById("example").rows[h].cells[3].innerHTML ;
                    document.getElementById("mostrar_celular").innerHTML = document.getElementById("example").rows[h].cells[4].innerHTML ;
                    document.getElementById("mostrar_email").innerHTML = document.getElementById("example").rows[h].cells[5].innerHTML ;
                }

            </script>

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
                    var apellido =$('#apellido').val();
                    var nombre =$('#nombre').val();
                    var licencia =$('#licencia').val();
                    var direccion =$('#direccion').val();
                    var celular =$('#celular').val();
                    var email =$('#email').val();
                    //var imagen ='/ficheros/'+$('#imagen').val();
                    var imagen = "/ficheros/" + $('#imagen').val().split("\\")[2];

                    $.ajax({
                        url:'../Controllers/crear_persona.php',
                        type:'POST',
                        data:'apellido='+apellido+'&nombre='+nombre+"&licencia="+licencia+"&email="+email+'&direccion='+direccion+'&celular='+celular+'&imagen='+imagen
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

