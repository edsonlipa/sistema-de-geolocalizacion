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
                                        <small>Registro de Personas</small>
                                    </h1>
                                    <hr class="fx-line">

                                    <div class="panel">

                                        <div class="form-group">
                                            <label for="ap" class="col-lg-2 control-label">Apellido :</label>
                                            <input type="text" class="form-control" name="ap" id="apellido" placeholder="Apellido" style="width:330px;" required>
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
                                            <input type="text"  class="form-control" name="email" id="email" style="width:330px;" placeholder="Correo electronico" required>
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
                                                    <form action='../recogerFichero.php' method='POST' enctype='multipart/form-data' target='_blanck' >
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
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
     require("modelo_persona.php");
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
			document.getElementById("mostrar_imagen").innerHTML =" <img src='../Resources/img/"+document.getElementById("example").rows[h].cells[6].innerHTML+" ' >";
			document.getElementById("mostrar_nombre").innerHTML = document.getElementById("example").rows[h].cells[1].innerHTML ;
			document.getElementById("mostrar_apellido").innerHTML = document.getElementById("example").rows[h].cells[2].innerHTML ;
			document.getElementById("mostrar_direccion").innerHTML = document.getElementById("example").rows[h].cells[3].innerHTML ;
			document.getElementById("mostrar_celular").innerHTML = document.getElementById("example").rows[h].cells[4].innerHTML ;
			document.getElementById("mostrar_email").innerHTML = document.getElementById("example").rows[h].cells[5].innerHTML ;
		}
        function mostrarmodal(){

            $('#myModal').modal('toggle');
        }

    </script>

</table>
</body>
</html>