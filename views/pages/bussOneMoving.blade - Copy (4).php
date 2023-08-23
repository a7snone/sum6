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
//function updteLatLong(){

// var lat = getPosition.coords.latitude;
// var long = getPosition.coords.longitude;

// echo("console.log(lat);");

// <?php
// // array
// $array = [
//     "lat" => 9,
//     "long" => 6
// ];

// // encode array to json
// $json = json_encode(array($array));

// //write json to file
// if (file_put_contents("busNoTow.json", $json))
//     echo "JSON file created successfully...";
// else 
//     echo "Oops! Error creating json file...";
// ?>

// }

</script>



<script  >
    
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
            //setNewData()
            navigator.geolocation.getCurrentPosition(getPosition)
        }, 1000);
    }

   
    var marker, circle, Lat=0, Long=0, i=0;
    <?php
    $counter = 0 ;
    ?>
    
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



    // function download(content, fileName, contentType) {
    //     var a = document.createElement("a");
    //     var file = new Blob([content], {type: contentType});
    //     a.href = URL.createObjectURL(file);
    //     a.download = fileName;
    //     a.click();
    // }




    
    function getPosition(position){

        const BNOne = JSON.parse(localStorage.getItem("BNOne"));
        console.log(BNOne.lat , BNOne.long);

        
       // const { writeFileSync } = require("fs");

        //console.log(Lat);

        //updteLatLong(55,99);



        //download({"name": 33}, 'json.txt', 'text/plain');
        
<?php
        //import {fs} from 'fs';

//  $datatet = [
//     "name" => 'image_name',
//     "title" => 'image_title'
//  ];

//     Storage::disk('public')->put('images.json', json_encode($datatet));
?>

// fs.appendFile('mynewfile1.txt', 'Hello content!', function (err) {
//   if (err) throw err;
//   console.log('Saved!');
// });
        







        fetch("./busNoTow.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
           // console.log(data[0]);
            Lat = data[0].lat;
            Long = data[0].long;
        })

        var accuracy = position.coords.accuracy

        if(marker) {
            map.removeLayer(marker)
        }

        if(circle) {
            map.removeLayer(circle)
        }

        marker = L.marker([BNOne.lat, BNOne.long])
        circle = L.circle([BNOne.lat, BNOne.long], {radius: accuracy})

        var featureGroup = L.featureGroup([marker, circle]).addTo(map)

        map.fitBounds(featureGroup.getBounds())

        //console.log(Lat, Long)

    }

</script>