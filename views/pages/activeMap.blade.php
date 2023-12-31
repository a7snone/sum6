@extends('layouts.master')

<!-- @section('pageTitle', 'التسجيل في خدمة النقل') -->

@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="antialiased">
    <div class="container">
        <!-- main app container -->
        <!-- <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 "> -->
                        <div id="map" style='width: 100%; height:600px'></div>

                    <!-- </div>
                </div>
            </div>
        </div> -->
        <!-- credits -->

    </div>

</body>
<script type="text/javascript">
    function initializeMap() {
        const locations = <?php echo json_encode($locations) ?>;

        const map = new google.maps.Map(document.getElementById("map"));
        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        for (var location of locations) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.lat, location.lng),
                map: map
            });
            bounds.extend(marker.position);
            google.maps.event.addListener(marker, 'click', (function(marker, location) {
                return function() {
                    infowindow.setContent(location.st_name );
                    infowindow.open(map, marker);
                    //infowindow.setContent("<a href='https://www.google.com/maps/?q="+ location.lat+','+location.lng +"'>" + location.st_name+"<br/>"+location.lat + "</a>");
                    infowindow.setContent("<a class='activeMapInfoWindow' href='https://www.google.com/maps/?q="+ location.lat+','+location.lng +"'>" + location.st_name+"<br/>"+location.st_mobile +"</br>رقم الباص: "+ location.areaCode + "</a>");
                    // infowindow.setContent(location.st_mobile);
                }
            })(marker, location));

        }
        map.fitBounds(bounds);
    }
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initializeMap"></script>








@endsection
