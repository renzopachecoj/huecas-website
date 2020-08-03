function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(-2.1534386,-79.9609428),
        zoom: 12
    });
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP or XML file
    downloadUrl('huecas.xml', function (data) {
        var xml = data.responseXML;
        var huecas = xml.documentElement.getElementsByTagName('hueca');
        Array.prototype.forEach.call(huecas, function (markerElem) {
            var nombre = markerElem.getAttribute('nombre');
            console.log(nombre);
            var telefono = markerElem.getAttribute('telefono');
            var direccion = markerElem.getAttribute('direccion');
            var facebook = markerElem.getAttribute('facebook');
            var instagram = markerElem.getAttribute('instagram');
            var twitter = markerElem.getAttribute('twitter');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('latitud')),
                parseFloat(markerElem.getAttribute('longitud')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text_telf = document.createElement('text');
            text_telf.textContent = "Telefono: "+telefono;
            var text_dir = document.createElement('text');
            text_dir.textContent = "Direccion: "+direccion;
            var text_fb = document.createElement('text');
            text_fb.textContent = "Facebook: "+facebook;
            var text_ins = document.createElement('text');
            text_ins.textContent = "Instagram: "+instagram;
            var text_twi = document.createElement('text');
            text_twi.textContent = "Twitter: "+twitter;
            var espacio = document.createElement('br');
            infowincontent.append(text_telf, espacio, 
                                    text_dir, espacio,
                                    text_fb, espacio,
                                    text_ins, espacio,
                                    text_twi);
            
            
            var marker = new google.maps.Marker({
                map: map,
                position: point,
            });
            marker.addListener('click', function () {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
        });
    });
}
function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() { }
