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
        .controls {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
</head>
<body>

<div id="map"></div>

<!-- Controles sobre el mapa -->
<div class="controls">
    <label for="speedControl">Velocidad:</label>
    <input type="range" id="speedControl" min="1" max="60" value="60">
    <span id="speedValue">60</span> seg/punto
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([-17.9625, -67.1065], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let dancerMarker;
        let routePoints = [];
        let currentIndex = 0;
        let speed = 60000; // 5 segundos por defecto
        let interval;

        // Control de velocidad con input range
        document.getElementById('speedControl').addEventListener('input', function () {
            let newSpeed = parseInt(this.value);
            document.getElementById('speedValue').innerText = newSpeed;
            speed = newSpeed * 1000;

            // Reiniciar la animación con la nueva velocidad
            if (interval) {
                clearInterval(interval);
                startMovingDancer();
            }
        });

        // Calcular la distancia entre dos puntos (Haversine)
        function distance(lat1, lon1, lat2, lon2) {
            var R = 6371e3;
            var φ1 = lat1 * Math.PI / 180;
            var φ2 = lat2 * Math.PI / 180;
            var Δφ = (lat2 - lat1) * Math.PI / 180;
            var Δλ = (lon2 - lon1) * Math.PI / 180;

            var a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                Math.cos(φ1) * Math.cos(φ2) *
                Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            return R * c; // Distancia en metros
        }

        // Encuentra el punto más cercano en la ruta
        function findClosestPoint(lat, lng) {
            let minDist = Infinity;
            let closestPoint = null;
            let closestIndex = 0;

            for (let i = 0; i < routePoints.length; i++) {
                let point = routePoints[i];
                let dist = distance(lat, lng, point[0], point[1]);

                if (dist < minDist) {
                    minDist = dist;
                    closestPoint = point;
                    closestIndex = i;
                }
            }

            return { closestPoint, closestIndex };
        }

        // Función para iniciar el movimiento del bailarín
        function startMovingDancer() {
            clearInterval(interval); // Detener cualquier animación previa
            interval = setInterval(() => {
                if (currentIndex < routePoints.length - 1) {
                    currentIndex++;
                    let nextPoint = routePoints[currentIndex];

                    // Mover el marcador al siguiente punto y mostrar número de línea
                    dancerMarker.setLatLng(nextPoint)
                        .bindPopup(`Línea: ${currentIndex + 1}<br>Posición: ${nextPoint[0].toFixed(6)}, ${nextPoint[1].toFixed(6)}`)
                        .openPopup();

                    console.log(`Número de línea actual: ${currentIndex + 1}`);
                } else {
                    clearInterval(interval); // Detener el movimiento al llegar al final
                }
            }, speed);
        }

        const urlParams = new URLSearchParams(window.location.search);
        const dancerId = urlParams.get('id') || 1; // Si no hay ID, usa 1 por defecto

        console.log("Bailarín ID:", dancerId); // Para verificar en la consola

        // Cargar la línea de la ruta desde la API
        axios.get('/api/lineas')
            .then(response => {
                routePoints = response.data;

                var polyline = L.polyline(routePoints, { color: 'blue' }).addTo(map);
                map.fitBounds(polyline.getBounds());

                // Cargar el bailarín después de la ruta
                axios.get(`/api/dancers/${dancerId}`)
                    .then(response => {
                        let dancer = response.data;
                        let lat = parseFloat(dancer.lat);
                        let lng = parseFloat(dancer.lng);

                        // Crear el marcador draggable
                        dancerMarker = L.marker([lat, lng], { draggable: true }).addTo(map)
                            .bindPopup(`<b>${dancer.name}</b><br>Posición: ${lat}, ${lng}`)
                            .openPopup();

                        // Encontrar la posición inicial más cercana en la ruta
                        let { closestIndex } = findClosestPoint(lat, lng);
                        currentIndex = closestIndex;

                        // Iniciar movimiento automático
                        startMovingDancer();

                        // Evento cuando el marcador es arrastrado
                        dancerMarker.on('dragend', function (event) {
                            let newLatLng = event.target.getLatLng();

                            // Encontrar el punto más cercano en la línea de la ruta
                            let { closestPoint, closestIndex } = findClosestPoint(newLatLng.lat, newLatLng.lng);

                            if (closestPoint) {
                                // Mover el marcador al punto más cercano en la línea
                                dancerMarker.setLatLng(closestPoint);

                                // Actualizar la posición de inicio
                                currentIndex = closestIndex;

                                // Actualizar el popup con la nueva posición
                                dancerMarker.setPopupContent(`<b>${dancer.name}</b><br>Posición ajustada: ${closestPoint[0].toFixed(6)}, ${closestPoint[1].toFixed(6)}`)
                                    .openPopup();

                                // Reiniciar movimiento desde el nuevo punto con la velocidad actual
                                startMovingDancer();
                            }
                        });

                    })
                    .catch(error => console.error("Error al obtener los datos del bailarín:", error));
            })
            .catch(error => console.error("Error al obtener la ruta:", error));
    });
</script>

</body>
</html>
