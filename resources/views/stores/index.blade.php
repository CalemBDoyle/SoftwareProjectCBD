
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
</head>
<body>

<div id="map" style="height: 500px;"></div> <!-- Map container -->

<!-- Leaflet JS -->


<script>
    var map = L.map('map').setView([52.792992, -6.163598], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19, 
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var stores = @json($stores); // Pass stores to JavaScript

stores.forEach(store => {
    L.marker([store.lat, store.long])
        .addTo(map)
        .on('click', function() {
            // Generate the URL for the 'show' route based on the store's id
            const link = `/stores/${store.id}`; // This will generate a link like /store/1
            window.location.href = link; // Redirect to the URL
        });
});
// var marker = L.marker([52.794977, -6.160455]).addTo(map);
// var marker = L.marker([52.793316, -6.164274]).addTo(map);
// var marker = L.marker([52.795354, -6.163137]).addTo(map);
// var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
</script>
</body>
</x-app-layout>