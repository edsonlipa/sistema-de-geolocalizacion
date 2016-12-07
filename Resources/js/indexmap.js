
/**
 * Created by edson on 22/07/2016.
 */

var map;
var myCenter;
var myPos;
var new_marker_for_lugar;
var myCenter1;


function iniciar() {
    myCenter=new google.maps.LatLng(-16.4045861,-71.5311351);
    map = new google.maps.Map(document.getElementById('mapa'), {
        center: myCenter,
        zoom: 15
    });
}
function cleanMap() {
    setMapOnAll(null);
}

function set_marcador(lat,long){
    myCenter1=new google.maps.LatLng(lat,long);
    var marker=new google.maps.Marker({
        position:myCenter1
    });
    marker.setMap(map);
}

function enrutar(latorigen,longorigen,latdestino,longdestino) {
    origen=new google.maps.LatLng(latorigen,longorigen);
    destino=new google.maps.LatLng(latdestino,longdestino);
    var objConfigDR
        = {
        origin:map
    };
    var objConfigDS = {
        origin:origen,
        destination:destino,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    var directionsService = new google.maps.DirectionsService;
    var directionsRenderer = new google.maps.DirectionsRenderer(objConfigDR);

    directionsRenderer.setMap(map);
    directionsService.route(objConfigDS, function(resultado, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(resultado);

        }
        else{
            alert('error'+status);
        }
    });
}
function esperar(){
    console.log("hola");
    var listener1 = google.maps.event.addListener(map, 'click', function(event) {
        var latlong = event.latLng;
        addMarker(latlong, map);
        document.getElementById("Latitud").value=latlong.lat();
        document.getElementById("Longitud").value=latlong.lng();
        $("#lugarModal").modal();
        $("#lugarModal").on('hidden.bs.modal', function (e) {
            cancel_marker();
        });
        google.maps.event.removeListener(listener1);
    });
}

function crear_lugar() {
    var datos={"Latitud":$('#Latitud').val(),
               "Longitud": $('#Longitud').val(),
                "Nombre":$('#Nombre').val(),
                "codLugar":$('#codLugar').val()};
                console.log($('#Nombre').val());
                console.log($('#codLugar').val());


    if (datos["Nombre"]&&datos["codLugar"]) {
        $.ajax({
            url:'../Controllers/crear_lugar.php',
            type:'POST',
            data:datos
        }).done(function(resp){

            console.log(resp);
            if (resp=="correcto") {
                document.getElementById("Nombre").value="";
                document.getElementById("codLugar").value="";
                $("#lugarModal").modal('hide');
                $("#alert-success").fadeIn();
               setTimeout(function() {
                   $('#alert-success').fadeOut();
               },2000);

            }
            else {console.log("error al agregar lugar");}
        })
    }
    else{
        $("#warning_agregar").show();
        setTimeout(function() {
            $('#warning_agregar').fadeOut();
        },1500);

    }
}
function editar_lugar() {
    $("#lugarModal").modal();
}
function eliminar_lugar(id) {

}
function addMarker(location, map) { //funcion utilizado solo para agregar lugares
    new_marker_for_lugar = new google.maps.Marker({   //new_marker_for_lugar ya esta declarado como una variable global
        position: location,
        label: "nuevo marcador",
        map: map
    });
}
function cancel_marker() {
    new_marker_for_lugar.setMap(null);
}

function retornar_lugares() {
    //console.log("sdfsdhflkasdjfh");
    $.ajax({
        url:'../Controllers/info_markers.php',
        type:'POST',
        data:''
    }).done(function(resp){
        //console.log(resp[1].);
        for (i = 0; i < resp.length; i++)
        {
            console.log(i);
            var location=new google.maps.LatLng(resp[i].latitud,resp[i].longitud);
            var marcador_de_lugar = new google.maps.Marker({   //new_marker_for_lugar ya esta declarado como una variable global
                position: location,
                label: resp[i].id,
                map: map
            });
            var info="<table class=\"table table-sm\"> <tbody> <tr> <th >Identificador:</th> <td >"+resp[i].id+"</td> <th>Nombre:</th> <td>"+resp[i].nomLugar+"</td> </tr>"+
                " <tr> <th >Latitud:</th> <td >"+resp[i].latitud+"</td> <th>Longitud:</th> <td>"+resp[i].longitud+"</td> </tr>"+
                " <tr> <th >Codigo</th> <td >"+resp[i].codLugar+"</td> <th></th> "+
                "<td><a class=\"edit text-warning\" id=\"editar\" style='margin-right: 5%;' onclick='console.log(\""+resp[i].id+"\");'> <i class=\"fa fa-pencil\"></i> editar</a>" +
                "<a class=\"remove text-danger\" id=\""+resp[i].id+"\"  onclick=\"console.log("+resp[i].id+")\"> <i class=\"fa fa-trash-o \"></i>eliminar </a></td> </tr> </tbody> </table>";
            set_info(marcador_de_lugar,info);

        }
        console.log(resp[0].nomLugar);
        //document.getElementById("sugerenciasPersonas").innerHTML=resp;
    });
}
function Ubicar_Auto() {
    var datos={
        "placa":document.getElementById('placa_number').value
    };
    //console.log(datos.placa);
    $.ajax({
        url:'../Controllers/ubicar_auto.php',
        type:'POST',
        data:datos
    }).done(function(resp){
        console.log(resp.licencia);
        //console.log(resp);
        //document.getElementById("sugerenciasPersonas").innerHTML=resp;
        var location=new google.maps.LatLng(resp.latitud,resp.longitud);
        var icono ='../Resources/img/icono-auto.png';
        
        var marcador_de_lugar = new google.maps.Marker({   //new_marker_for_lugar ya esta declarado como una variable global
            position: location,
            label: resp.id,
            map: map,
            icon:icono
        });
        var info="<table class=\"table table-sm\"> <tbody>"+
            " <tr> <th >Identificador:</th> <td >"+resp.id+"</td> <th>Lugar:</th> <td>"+resp.nomLugar+"</td> </tr>"+
            " <tr> <th >Latitud:</th> <td >"+resp.latitud+"</td> <th>Longitud:</th> <td>"+resp.longitud+"</td> </tr>"+
            " <tr> <th >Nombre</th> <td >"+resp.nombreC+" "+resp.apellidoC+"</td> <th>Placa:</th> <td>"+resp.placa+"</td> </tr>"+
            " </tbody> </table>";
        Show_set_info(marcador_de_lugar,info);
    });
}
function set_info(marker, info) {
    var infowindow = new google.maps.InfoWindow({
        content: info
    });

    marker.addListener('click', function() {
        infowindow.open(marker.get('map'), marker);
    });
}
function Show_set_info(marker, info) {
    var infowindow = new google.maps.InfoWindow({
        content: info
    });
    infowindow.open(marker.get('map'), marker);
    marker.addListener('click', function() {
        infowindow.open(marker.get('map'), marker);
    });
}

    function Coincidencias()
    {
        var datos={
            "e":document.getElementById('Licencia_number').value
        };
        $.ajax({
            url:'../Controllers/coincidenciaspersonas.php',
            type:'POST',
            data:datos
        }).done(function(resp){
           // console.log(resp);
            document.getElementById("sugerenciasPersonas").innerHTML=resp;
        });
    }

    function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;}
    }
    }

    function escogerpersona(id)
    {
        //alert(document.getElementById("sugerencias").rows[id].cells[0].innerHTML);
         document.getElementById("Licencia_number").value=document.getElementById("sugerenciasPersonas").rows[id].cells[0].innerHTML;
    }
    function CoincidenciasAutos()
    {
        var datos={
            "e":document.getElementById('placa_number').value
        };
        $.ajax({
            url:'../Controllers/coincidenciasplacas.php',
            type:'POST',
            data:datos
        }).done(function(resp){
            //console.log(resp);
            document.getElementById("sugerenciasAutos").innerHTML=resp;
        });
    }

    function escogerAuto(id)
    {
        //alert(document.getElementById("sugerencias").rows[id].cells[0].innerHTML);
        document.getElementById("placa_number").value=document.getElementById("sugerenciasAutos").rows[id].cells[0].innerHTML;
    }
    function buscar() {
    //document.getElementById('licencia_number').value;
    //document.getElementById('placa_number').value;
    //document.getElementById('start_date').value;
    //document.getElementById('ending_date').value;
    var datos={
        "licencia":document.getElementById('Licencia_number').value,
        "placa":document.getElementById('placa_number').value,
        "start_date":document.getElementById('start_date').value,
        "ending_date":document.getElementById('ending_date').value
    };
    if (datos["licencia"]==""||datos["placa"]==""||datos["start_date"]==""||datos["ending_date"]=="" )
    {
        alert("alguno de los camapos esta vacion");
    }
    else
    {
        $.ajax({
            url:'../Controllers/buscar_trakeos_por_licencia.php',
            type:'POST',
            data:datos
        }).done(function(resp){
            //console.log(resp);
            if (resp=="no encontrado") {
                alert("no se ha encontrado trakeos")
            }
             else{
                for (i = 0; i < resp.length; i++) {
                console.log(resp[i].latitud);
                console.log(resp[i].longitud);
                    var location=new google.maps.LatLng(resp[i].latitud,resp[i].longitud);
                    var marcador_de_lugar = new google.maps.Marker({   //new_marker_for_lugar ya esta declarado como una variable global
                        position: location,
                        label: resp[i].id,
                        map: map
                    });
                    var info="<table class=\"table table-sm\"> <tbody> <tr> <th >Identificador:</th> <td >"+resp[i].id+"</td> <th>Nombre:</th> <td>"+resp[i].nomLugar+"</td> </tr>"+
                        " <tr> <th >Latitud:</th> <td >"+resp[i].latitud+"</td> <th>Longitud:</th> <td>"+resp[i].longitud+"</td> </tr>"+
                        " <tr> <th >Codigo</th> <td >"+resp[i].codLugar+"</td> <th></th> "+
                        "<td></td> </tr> </tbody> </table>";
                    set_info(marcador_de_lugar,info);

                    if(i>1){
                    enrutar(resp[i-1].latitud,resp[i-1].longitud,resp[i].latitud,resp[i].longitud);
                }
            }
             }
            
        });
    }


}
