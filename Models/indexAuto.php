<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src = "js/index.js" ></script>
    <link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
    <link rel = "stylesheet" href = "css/index.css" />
    <title>Admin</title>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div >

                    <div id="page-content-wrapper" style="width:75%;float:right;margin-top:5%;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="main col-lg-12">
                                    <h1 class="page-header">
                                        <small>Registro de Autos</small>
                                    </h1>
                                    <hr class="fx-line">

                                    <div class="panel">

                                        <div class="form-group" >
                                            <label for="placa" class="col-lg-2 control-label">Placa:</label>
                                            <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa" style="width:330px;" required>
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
                                            <!DOCTYPE html>
                                            <html>
                                            <head>
                                                <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
                                                <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

                                            </head>
                                            <body>
                                            <header>
                                                Foto :
                                            </header>
                                            <section id="mainContent" class="mainContent">

                                                <div class="formularioImagen">
                                                    <form action='recogerFichero.php' method='POST' enctype='multipart/form-data' target='_blanck' >
                                                        <input class="inputFile" type='file' id='foto' name='foto' ><br>
                                                        <button type="button" class="btn btn-success" style="margin-left:265px;" onclick="prueba();">subir</button>
                                                    </form>
                                                </div>

                                            </section>
                                            </body>
                                            </html>
                                        </div>



                                        <p class="login-submit">
                                            <button type="button" class="btn btn-success" style="margin-left:265px;"onClick="crear();">Entrar</button>
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
                                var file_data = $("#foto").prop("files")[0];
                                var form_data = new FormData();
                                form_data.append("file", file_data)

                                $.ajax({
                                    url: "../Views/recogerFichero.php",
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
                                var placa =$('#placa').val();
                                var codicono =$('#codicono').val();
                                var color =$('#color').val();
                                var foto ="/ficheros/" + $('#foto').val().split("\\")[2];
                                var marca =$('#marca').val();

                                $.ajax({
                                    url:'../Controllers/crear_auto.php',
                                    type:'POST',
                                    data:'placa='+placa+'&codicono='+codicono+"&color="+color+"&foto="+foto+'&marca='+marca
                                }).done(function(resp){
                                    alert(resp);

                                })};
                        </script>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
<table id="example" class="display" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Placa</th>
        <th>Codicono</th>
		<th>Color</th>

		<th>Foto</th>
		<th>Marca</th>
        <th>Acciones</th>
	</tr>
	</thead>
	<tfoot>
    <tr>
        <th>Placa</th>
        <th>Codicono</th>
        <th>Color</th>

        <th>Foto</th>
        <th>Marca</th>
        <th>Acciones</th>
    </tr>
    </tfoot>
 
	<tbody>

	<?php
     require("modelo_auto.php");
     $modeloauto=new modelo_auto();
     $autos=$modeloauto->getAll();

	$longitud = count($autos);
	for($i=0; $i<$longitud; $i++)
      {
          $a=$i+1;
    echo '  <tr id="'.$a.'" onclick="mostrar(this.id);">';
	echo'<td>'.$autos[$i]->getPlaca().'</td>
         <td>'.$autos[$i]->getCodicono().'</td>
         <td>'.$autos[$i]->getColor().'</td>
         <td>'.$autos[$i]->getFoto().'</td>
         <td>'.$autos[$i]->getMarca().'</td>;
          <td>
		 <button type="submit"
                value="Editar"
                id="evento_editar"
                name="evento_editar" onclick ="mostrarmodal()" >editar</button> 
		<button type="submit"
                value="Eliminar"
                id="evento_eliminar"
                name="evento_eliminar" onclick="" class="btn btn-lg btn-primary toggle-modal" value="editar" >Eliminar</button>
		</td>';
     echo '</tr>';
        }
     ?>

    <table class="table table-condensed" width="50%" border="1">
        <tr>
            <td rowspan="5" id="mostrar_imagen"></td>
        </tr>
        <tr>
            <th>Placa</th>
            <td id="mostrar_placa"></td>
        </tr>
        <tr>
            <th>Codicono</th>
            <td id="mostrar_codicono"></td>
        </tr>
        <tr>
            <th>Color</th>
            <td id="mostrar_color"></td>
        </tr>

        <tr>
            <th>Marca</th>
            <td id="mostrar_marca"></td>
        </tr>
    </table>
    <button type="submit"
            value="Agregar"
            id="evento_agregar"
            name="evento_agregar" onclick ="mostrarmodal()">Agregar</button>

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
            document.getElementById("mostrar_imagen").innerHTML =" <img src='../Resources/"+document.getElementById("example").rows[h].cells[3].innerHTML+" ' >";
            document.getElementById("mostrar_placa").innerHTML = document.getElementById("example").rows[h].cells[0].innerHTML ;
            document.getElementById("mostrar_codicono").innerHTML = document.getElementById("example").rows[h].cells[1].innerHTML ;
            document.getElementById("mostrar_color").innerHTML = document.getElementById("example").rows[h].cells[2].innerHTML ;

            document.getElementById("mostrar_marca").innerHTML = document.getElementById("example").rows[h].cells[4].innerHTML ;
            //document.getElementById("mostrar_email").innerHTML = document.getElementById("example").rows[h].cells[5].innerHTML ;

        }
        function mostrarmodal(){

            $('#myModal').modal('toggle');
        }
    </script>
</table>
</body>
</html>