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

                            <div class="row">
                                <div class="main col-lg-12">
                                    <h1 class="page-header">
                                        <small>Registro de usuarios</small>
                                    </h1>
                                    <hr class="fx-line">

                                    <div class="panel">
                                        <form method="post" role="form" class="login" >

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
                                                <button type="button" class="btn btn-success" style="margin-left:265px;" onclick="crear();">Entrar</button>
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
                    <script>
                        function crear() {
                            var id =$('#id').val();
                            var nombre =$('#nombres').val();
                            var usuario =$('#usuarios').val();
                            var password =$('#password').val();
                            var tipo =$('#tipo').val();

                            $.ajax({
                                url:'../Controllers/crear_usuario.php',
                                type:'POST',
                                data:'id='+id+'&nombres='+nombres+"&usuarios="+usuarios+"&password="+password+'&tipo='+tipo
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
        require("modelo_usuario.php");
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
            //alert(h)
            document.getElementById("mostrar_id").innerHTML = document.getElementById("example").rows[h].cells[0].innerHTML ;
            document.getElementById("mostrar_nombre").innerHTML = document.getElementById("example").rows[h].cells[1].innerHTML ;
            document.getElementById("mostrar_user").innerHTML = document.getElementById("example").rows[h].cells[2].innerHTML ;
            document.getElementById("mostrar_password").innerHTML = document.getElementById("example").rows[h].cells[3].innerHTML ;
            //document.getElementById("mostrar_email").innerHTML = document.getElementById("example").rows[h].cells[5].innerHTML ;
        }
        function mostrarmodal(){

            $('#myModal').modal('toggle');
        }
    </script>
</table>
</body>
</html>