<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تتبع الباص رقم 8</title>
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
    
<div id="map"></div>
    
</body>
</html>


<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>

</script>



<script  >
    //const fileSystem = require("browserify-fs")

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
        
// <?php
// $file = fopen("BOL.txt","w+");

// fwrite($file, '6');
// fclose($file);

// ?>

// const BNTow = {
//   "lat": position.coords.latitude,
//   "long": position.coords.longitude
// };

// // Converting the JSON string with JSON.stringify()
// // then saving with localStorage in the name of session
// localStorage.setItem("BNTow", JSON.stringify(BNTow));

// // Example of how to transform the String generated through
// // JSON.stringify() and saved in localStorage in JSON object again
// const sesionData = JSON.parse(localStorage.getItem("BNTow"));

// // Now restoredSession variable contains the object that was saved
// // in localStorage
// //console.log(sesionData.lat , sesionData.long);


//const fs = require("fs");


    fetch("./busNoEight.json")
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

    marker = L.marker([Lat,Long])//([sesionData.lat, sesionData.long])
    circle = L.circle([Lat, Long], {radius: accuracy})

    var featureGroup = L.featureGroup([marker, circle]).addTo(map)

    map.fitBounds(featureGroup.getBounds())

    }

</script>


<script >

</script>

