<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mapa con Leaflet y Axios</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([-17.9625, -67.1065], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Array para almacenar las coordenadas de cada clic en el mapa
        var clickArray = [];

        // Evento que se ejecuta al hacer clic en el mapa
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Se guarda el objeto con las coordenadas en el array
            clickArray.push({ lat: lat, lng: lng });

            // Se muestra el array actualizado en la consola
            console.log(clickArray);
        });

        axios.get('/api/lineas')
            .then(response => {
                routePoints = response.data;

                var polyline = L.polyline(routePoints, {color: 'blue'}).addTo(map);
                map.fitBounds(polyline.getBounds());
            }
        );
    });
</script>

</body>
</html>
