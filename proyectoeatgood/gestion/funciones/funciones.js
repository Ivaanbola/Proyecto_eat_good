function getXMLHTTPRequest() {
    try {
        req = new XMLHttpRequest();
    } catch (err1) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                req = false;
            }
        }
    }
    return req;
}

var bFoto = getXMLHTTPRequest();
function borrarFoto(id) {
    if (confirm("Estas seguro de que quieres borrar la foto")) {
        var myurl = 'llamadas/borrarFoto.php';
        myRand = parseInt(Math.random() * 999999999999999);
        modurl = myurl + '?rand=' + myRand + '&id=' + id;
        bFoto.open("GET", modurl, true);
        bFoto.onreadystatechange = borrarFotoResponse;
        bFoto.send(null);
    }
}


function borrarFotoResponse() {

    if (bFoto.readyState == 4) {
        if (bFoto.status == 200) {
            var miTexto = bFoto.responseText;
            document.getElementById('cajaFoto').src = "img/defecto.jpg";
            document.getElementById('btnFoto').style.display = 'none';
        }
    }
}