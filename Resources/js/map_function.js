/**
 * Created by edson on 22/07/2016.
 */
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
