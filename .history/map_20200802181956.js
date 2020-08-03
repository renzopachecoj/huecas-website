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
            strong.textContent = nombre
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text_telf = document.createElement('text');
            text.textContent = telefono
            var text_dir = document.createElement('text');
            text.textContent = direccion
            var text_fb = document.createElement('text');
            text.textContent = facebook
            var text_ins = document.createElement('text');
            text.textContent = instagram
            var text_twi = document.createElement('text');
            text.textContent = twitter


            infowincontent.appendChild(text_dir);

            //infowincontent.append(text_telf, text_dir, text_fb, text_ins, text_twi);
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
