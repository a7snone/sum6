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


<script data-main="scripts/main" src="scripts/require.js">

var fs = require('fs');


</script>


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
        }, 4000);
    }

   
    var marker, circle, Lat, Long, i=0;
    
    // setInterval(() => {

    //     fetch("./busNoOne.json")
    //     .then(function (response) {
    //         return response.json();
    //     })
    //     .then(function (data) {
    //         console.log(data);
    //         Lat = data.lat;
    //         Long = data.long;
    //     })

    // }, 2000);

    
    function getPosition(position){
       // const { writeFileSync } = require("fs");

        //console.log(Lat);

        fetch("./busNoOne.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            Lat = data.lat;
            Long = data.long;
        })

        var accuracy = position.coords.accuracy

        if(marker) {
            map.removeLayer(marker)
        }

        if(circle) {
            map.removeLayer(circle)
        }

        marker = L.marker([Lat, Long])
        circle = L.circle([Lat, Long], {radius: accuracy})

        var featureGroup = L.featureGroup([marker, circle]).addTo(map)

        map.fitBounds(featureGroup.getBounds())

        console.log(Lat, Long)

    }

</script>