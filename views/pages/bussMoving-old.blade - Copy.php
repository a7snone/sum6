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
<button class="" onclick="testGetPosition(getPosition)">update</button>
    
<div id="map"></div>
    
</body>
</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    function setPosition(){
        alert('Hi there!');
    }
</script>

<script>
function testGetPosition(position){


    var lat = 26.333
    var long = 44.222


    var accuracy = position.coords.accuracy

    if(marker) {
        map.removeLayer(marker)
    }

    if(circle) {
        map.removeLayer(circle)
    }

    marker = L.marker([lat,long])
    circle = L.circle([lat,long], {radius: accuracy})

    var featureGroup = L.featureGroup([marker, circle]).addTo(map)

    map.fitBounds(featureGroup.getBounds())

    console.log(lat,long)
    
}
    

    // Map initialization 
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
            //navigator.geolocation.getPosition(getPosition)
        }, 4000);
    }

    var marker, circle;

    function getPosition(position){

        // fetch("./busNoOne.json")
        // .then(function (response) {
        //     return response.json();
        // })
        // .then(function (dataL) {
        //     // console.log(dataL);
        // })

        // fetch("./busNoOne.json")
        // .then(response => response.json())
        // .then(json => console.log(json->lat));


        // console.log(position)

        <?php
            $json = \File::get('busNoOne.json');
            $data = json_decode($json);
            // echo('console.log('.$data->lat.')');
        ?>

        <?php
        $MainLat = \App\Models\BussTracking::where('busNo',1)->orderBy('created_at','DESC')->first()->lat;
        $MainLong = \App\Models\BussTracking::where('busNo',1)->orderBy('created_at','DESC')->first()->long;
        // echo('console.log('.$MainLat.')');
        ?>
        // console.log({{$MainLat}});


        var lat = {{$data->lat}}//position.coords.latitude
        var long = {{$data->long}}//position.coords.longitude

        
        var accuracy = position.coords.accuracy

        if(marker) {
            map.removeLayer(marker)
        }

        if(circle) {
            map.removeLayer(circle)
        }

        marker = L.marker([{{$data->lat}}, {{$data->long}}])
        circle = L.circle([{{$data->lat}}, {{$data->long}}], {radius: accuracy})

        var featureGroup = L.featureGroup([marker, circle]).addTo(map)

        map.fitBounds(featureGroup.getBounds())

        // console.log("Your coordinate is: Lat: "+ {{$data->lat}} +" Long: "+ {{$data->long}} + " Accuracy: "+ accuracy)
        // console.log(lat)
        console.log({{$MainLat}}, {{$MainLong}})

    }

</script>