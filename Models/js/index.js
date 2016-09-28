$(function()
{
	var opcion = 0;
	var identificacion = 0;
	
	$(document).ready(function()
	{
		$( "#titulo" ).val( "" );
		$( "#link" ).val( "" );
		$( "#categoria" ).val( "Video" );
		$( "#coincidencia" ).val( "" );
		$( "#categoriaB" ).val( "Elegir...." );
		$( "#enviar , #nuevo" ).removeAttr( "disabled" );
	});
	
	function editarDatos( tipo )
	{
		$( "button[class*=editar]" ).bind('click',function()
		{
			identificacion = $(this).attr( "id" );
			
			$.ajax
			({
				type : "POST",
				dataType : "json",
				url : "librerias/guardarLink.php",
				data : { id : $(this).attr( "id" ) , type : 2 },
				success:function( data )
				{
					$( "#titulo" ).val( data[ 0 ].titulo );
					$( "#link" ).val( data[ 0 ].link );
					$( "#categoria" ).val( data[ 0 ].categoria ) ;
					$( "#enviar , #nuevo" ).attr( "disabled", "disabled" );
					$( "#actualizar" ).removeAttr( "disabled" );
					
					opcion = tipo;
				}
			});
		});
	}
	
	function eliminarDatos( tipo )
	{
		$( "button[class*=eliminar]" ).bind('click',function()
		{
			$.ajax
			({
				type : "POST",
				url : "librerias/guardarLink.php",
				data : { id : $(this).attr( "id" ) , type : 4 },
				success:function()
				{
					cargarTabla( tipo );
				}
			});
		});
	}
	
	function cargarTabla( opcion )
	{
		if( opcion == 1 )
		{
			$( "#cuerpo" ).load( "librerias/buscarLinks.php" , { coincidencia : $( "#coincidencia" ).val() , type : 1 } , function(responseText, textStatus, XMLHttoRequest)
			{
				if(textStatus == "success")
				{
					editarDatos( 1 );
					eliminarDatos( 1 );
				}
			}); 
		}
		else
		{
			$( "#cuerpo" ).load( "librerias/buscarLinks.php" , { valor : $( "#categoriaB option:selected" ).val() , type : 2 } , function(responseText, textStatus, XMLHttoRequest)
			{
				if(textStatus == "success")
				{
					editarDatos( 2 );
					eliminarDatos( 2 );
				}
			}); 
		}
	}
	
	$( "#actualizar" ).click(function()
	{
		$.ajax
		({
			type : "POST",
			url : "librerias/guardarLink.php",
			data : { id:identificacion , titulo : $( "#titulo" ).val() , link : $( "#link" ).val() , categoria : $( "#categoria option:selected" ).val() , type : 3 },
			success:function()
			{
				$( "#titulo" ).val( "" );
				$( "#link" ).val( "" );
				$( "#categoria" ).val( "Video" );
				$( "#enviar , #nuevo").removeAttr( "disabled" );
				$( "#actualizar" ).attr( "disabled", "disabled" );
				cargarTabla( opcion );
				alert( "Datos actualizados" );
			}
		});
	});
	
	$( "#coincidencia" ).keyup(function()
	{	
		cargarTabla( 1 );
	});
	
	
	$( "#categoriaB" ).change(function()
	{
		cargarTabla( 2 );
	});
	
	
	$( "#enviar" ).click(function()
	{
		if( $( "#titulo" ).val() != "" )
		{
			if( $( "#link" ).val() != "" )
			{
				$.ajax
				({
					type : "POST",
					url : "librerias/guardarLink.php",
					data : { titulo : $( "#titulo" ).val() , link : $( "#link" ).val() , categoria : $( "#categoria option:selected" ).val() , type : 1 },
					success:function()
					{
						$( "#titulo" ).val( "" );
						$( "#link" ).val( "" );
						$( "#categoria" ).val( "Video" );
						$( "#coincidencia" ).val( "" );
						$( "#categoriaB" ).val( "Elegir...." );
						alert( "Link guardado satifactoriamente" );
					}
				});
			}
			else
			{
				alert( "Debes de proporcionar un link");
			}
		}
		else
		{
			alert( "Debes de proporcionar un titulo");
		}
	});
	
	$( "#nuevo" ).click(function()
	{
		$( "#titulo" ).val( "" );
		$( "#link" ).val( "" );
		$( "#categoria" ).val( "Video" );
	});
});