@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

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
        <div id="map" style='width: 100%; height:600px'></div>
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
                    infowindow.setContent("<a href='https://www.google.com/maps/?q="+ location.lat+','+location.lng +"'>" + location.st_name+"<br/>"+location.lat + "</a>");
                    infowindow.setContent("<a href='https://www.google.com/maps/?q="+ location.lat+','+location.lng +"'>" + location.st_name+"<br/>"+location.st_mobile + "</a>");
                    // infowindow.setContent(location.st_mobile);
                }
            })(marker, location));

        }
        map.fitBounds(bounds);
    }
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initializeMap"></script>




<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644">ركاب الباص</p>
        @foreach($locations as $value)
        
        <?php 
        if($value->areaCode == '1'){
            $busNo='BusNoOne';
        }elseif($value->areaCode == '2'){
            $busNo='BusNoTow';
        }elseif($value->areaCode == '3'){
            $busNo='BusNoThree';
        }elseif($value->areaCode == '4'){
            $busNo='BusNoFour';
        }elseif($value->areaCode == '8'){
            $busNo='BusNoEight';
        }else{
            $busNo='setDelivered';
        }
        ?>


        <!-- <form action="{{ url($busNo.'/'.$value->id) }}" method="POST">
            <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
        @csrf
        @method('PUT')
        @csrf -->
            <div class="busActiveMapStudent">
                <?php
                $studentStatus='غير محدد';
                if($value->note=='takedFromHome'){
                    $studentStatus='تم الاستلام من المنزل';
                }elseif($value->note=='deliverToClub'){
                    $studentStatus='تم التوصيل لمقر النادي';
                }elseif($value->note=='takedFromClub'){
                    $studentStatus='تم الاستلام من مقر النادي';
                }elseif($value->note=='deliverBackHome'){
                    $studentStatus='تم التوصيل للمنزل';
                }elseif($value->note=='Absentee'){
                    $studentStatus='متغيب';
                }
                ?>
                <div class="studentStatusBtnContainer">
                    <p class="busActive_st_name">{{$value->st_name}} - <span class="studentStatusLayout {{$value->note}}">{{ $studentStatus}} </span> </p>
                    <form action="{{ url('setAbsentee'.$busNo.'/'.$value->id) }}" method="POST">
                        <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
                        <!-- <input id="note" name="note" type="hidden" value="onBus"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtnAbsentee btn_ btn-sm_ btn-danger " type="submit" value="متغيب">
                    </form>
                </div>

                <div class="studentStatusBtnContainer">
                    

                    <form action="{{ url('setTakedFromHome'.$busNo.'/'.$value->id) }}" method="POST">
                        <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
                        <!-- <input id="note" name="note" type="hidden" value="onBus"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn btn btn-sm_ btn-success_ " type="submit" value="استلام من المنزل">
                    </form>
                    
                    <form action="{{ url('setDeliverToClub'.$busNo.'/'.$value->id) }}" method="POST">
                        <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
                        <!-- <input id="note" name="note" type="hidden" value="deliverToClub"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn btn btn-sm_ btn-success_ " type="submit" value="توصيل لمقر النادي">
                    </form>
                    
                    <form action="{{ url('setTakedFromClub'.$busNo.'/'.$value->id) }}" method="POST">
                        <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn btn btn-sm_ btn-success_ " type="submit" value="استلام من مقر النادي">
                    </form>
                    
                    <form action="{{ url('setDeliverBackHome'.$busNo.'/'.$value->id) }}" method="POST">
                        <input id="areaCode" name="areaCode" type="hidden" value="{{$value->areaCode}}"></input>
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn btn btn-sm_ btn-success_ " type="submit" value="توصيل للمنزل">
                    </form>
                    
                
                    <!-- <input style="" class="studentStatusBtn btn_ btn-sm_ btn-success_ " type="submit" value="توصيل لمقر النادي">
                    <input style="" class="studentStatusBtn btn_ btn-sm_ btn-success_ " type="submit" value="استلام من مقر النادي">
                    <input style="" class="studentStatusBtn btn_ btn-sm_ btn-success_ " type="submit" value=" توصيل للمنزل"> -->
                    <!-- <input style="" class="studentStatusBtn btn_ btn-sm_ btn-success_ " type="submit" value="متغيب"> -->
                </div>
                </br>
            </div>

        <!-- </form> -->
        @endforeach
    </div>
</div>



@endsection
