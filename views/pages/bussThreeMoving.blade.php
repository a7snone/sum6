<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>
    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
    
<?php
// $json = \File::get('busNoOne.json');
// $data = json_decode($json);
// echo $data->lat; // John Doe
?>
<!-- <button class="" onclick="testGetPosition(getPosition)">update</button> -->
    
<div id="map"></div>
    
</body>
</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>



<script>
    
    var map = L.map('map').setView([26.3412,43.1212], 6);
    
    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    if(!navigator.geolocation) {
        console.log("Your browser doesn't support geolocation feature!")
    } else {
        setInterval(() => {
            navigator.geolocation.getCurrentPosition(getPosition)
        }, 1000);
    }
    var marker, circle, Lat=0, Long=0, i=0;

    function getPosition(position){

        const BusData = JSON.parse(localStorage.getItem("BNThree"));
        console.log(BusData.lat , BusData.long);


        var accuracy = position.coords.accuracy

        if(marker) {
            map.removeLayer(marker)
        }

        if(circle) {
            map.removeLayer(circle)
        }

        marker = L.marker([BusData.lat, BusData.long])
        circle = L.circle([BusData.lat, BusData.long], {radius: accuracy})

        var featureGroup = L.featureGroup([marker, circle]).addTo(map)

        map.fitBounds(featureGroup.getBounds())

  
    }

</script>