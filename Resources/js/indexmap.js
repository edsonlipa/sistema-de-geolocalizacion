/**
 * Created by edson on 22/07/2016.
 */

var map;
var myCenter;
var myPos;

var myCenter1;
var myCenter2;
function iniciar() {
    myCenter=new google.maps.LatLng(-16.4045861,-71.5311351);
    map = new google.maps.Map(document.getElementById('mapa'), {
        center: myCenter,
        zoom: 15
    });


}
function CleanOverlays() {
    map.clearOverlays();

}
function marcador(){
    myCenter1=new google.maps.LatLng(-16.4026179,-71.529429);
    var marker=new google.maps.Marker({
        position:myCenter1
    });
    marker.setMap(map);

    myCenter2=new google.maps.LatLng(-16.404865, -71.532315);
    var marker1=new google.maps.Marker({
        position:myCenter2
    });
    marker1.setMap(map);
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
                set_marcador(resp[i].latitud,resp[i].longitud);
                if(i>1){
                    enrutar(resp[i-1].latitud,resp[i-1].longitud,resp[i].latitud,resp[i].longitud);
                }
            }
             }
            
        });
    }


}