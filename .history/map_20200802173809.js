var customLabel = {
    restaurant: {
        label: 'R'
    },
    bar: {
        label: 'B'
    }
};

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(-2.1534386,-79.9609428),
        zoom: 12
    });
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP or XML file
    downloadUrl('huecas.xml', function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('hueca');
        Array.prototype.forEach.call(markers, function (markerElem) {
            var name = markerElem.getAttribute('nombre');
            var address = markerElem.getAttribute('telefono');
            var address = markerElem.getAttribute('direccion');
            var address = markerElem.getAttribute('latitud');
            var address = markerElem.getAttribute('longitud');
            var address = markerElem.getAttribute('facebook');
            var address = markerElem.getAttribute('instagram');
            var address = markerElem.getAttribute('twitter');

            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
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
