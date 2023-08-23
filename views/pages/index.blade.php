@extends('layouts.master')

<!-- @section('pageTitle', 'التسجيل في خدمة النقل') -->

@section('content')

<div>
    <div class="transferingDetails" style="margin-top: 50px;
                margin-bottom: 50px;
                margin-right: 5%;
                margin-left: 5%;
                border: .2px solid #1110;
                color: #78a;
                font-weight: 400;
                text-align: right;
                font-size: 20px;">
- رسوم النقل ٣٨٠ ريال تودع على حساب : صندوق الطلاب بجامعة القصيم - الايبان SA5180000493608010005332        <p style="">- في حالة تحديد موقع غير تابع للمشترك سيتم اعادة المبلغ مع خصم
            رسوم ادارية وقدرها ٥٠
            ريال</p>
        <p style="">- تسجيل وسداد رسوم النقل لاتعتبر موافقة النادي على خدمة النقل الا
            بعد حضور ولي الامر
            للنادي لاستكمال اجراءات
            الموافقة النهائية.</p>
        <p style="">- تبداء خدمة نقل المشترك بعد ٢٤ ساعة من موافقة النادي على خدمة
            النقل.</p>
        <p style="">- يلتزم النادي بنقل المشترك للموقع المعتمد فقط.</p>
    </div>



    <form action="register" method="POST" enctype="multipart/form-data"
        style="text-align: right; font-size:20px; color:#77a">

        @csrf
        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">اسم المشترك ثلاثي </label>
            <input style="" type="text" id="name" name="name" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">رقم الهوية</label>
            <input style="" type="text" id="id" name="id" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">رقم الجوال</label>
            <input style="" type="text" id="mobile1" name="mobile1" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">رقم جوال ولي الامر</label>
            <input style="" type="text" id="mobile2" name="mobile2" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">موقع السكن</label>
            <input style="" type="text" id="homelocation" name="homelocation" class="form-control" required=""
                placeholder="الرجاء تحديد موقع المنزل بدقة من خلال الخريطة بالأسفل" >
        </div>

        <input type="hidden" id="lat" name="lat" value="26.3495881">
        <input type="hidden" id="lng" name="lng" value="43.7600631">


        <!-- <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">موقع السكن</label>
            <input style="" type="text" id="lat" name="lat" class="form-control" required=""
                placeholder="الرجاء تحديد موقع المنزل بدقة من خلال الخريطة بالأسفل" readonly>
        </div>
        <div class="form-group">
            <label  style="text-align: right; font-size:20px; color:#77aclass="inputBox">موقع السكن</label>
            <input  style="" type="text" id="lng" name="lng" class="form-control" required=""
                placeholder="الرجاء تحديد موقع المنزل بدقة من خلال الخريطة بالأسفل" readonly>
        </div> -->


        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class=" inputBox">اسم المودع</label>
            <input style="" type="text" id="depositor" name="depositor" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class=" inputBox">رقم الحساب</label>
            <input style="" type="text" id="accountNo" name="accountNo" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">ايصال الدفع</label>
            <input type="file" id="receipt" name="receipt" accept="image/*" class="form-control" required="" >
            <!-- <input type="file" id="img" name="img" accept="image/*"> -->
        </div>


        <button type="submit" class="btn btn-primary">تسجيل</button>
    </form>
</div>
<!-- <div id="floating-panel">Coordinates:
        <label id="text"></label>
    </div> -->
<div id="googleMap" style="width:100%;height:600px;"></div>

<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(26.3191644, 44.0096853),
            zoom: 20,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }

</script>

<script>
    var map;
    var markers = [];

    function initMap() {
        var center = {
            lat: 26.3493923,
            lng: 43.9680779
        };

        map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 13,
            center: center,
            mapTypeId: 'terrain'
        });

        map.addListener('click', function (event) {
            clearMarkers();
            addMarker(event.latLng);
            document.getElementById("homelocation").value = event.latLng.lat() + ',' + event.latLng.lng();
            document.getElementById("lat").value = event.latLng.lat();
            document.getElementById("lng").value = event.latLng.lng();
        });


    }

    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

</script>

<!-- <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=myMap">
    </script> -->

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap">
</script>

<input class="btnShowAvailableAreas" style="width: 100%;
    height: 60px;
    margin-top: 20px;
    color: #4b9da8;
    border: 0 solid #000;display:block;" type="button" name="showMap" id="showMapbtn"
    value="استعراض الأماكن المشمولة في خدمة النقل" onclick="showMap()" />

<iframe style="display:none;" id="availableArea"
    src="https://www.google.com/maps/d/u/0/embed?mid=1BHcrhl1B1Cg7hb8Ty3qeW3f__lmAJe0&ehbc=2E312F" width="100%"
    height="600">
</iframe>



<script>
    function showMap() {
        if (document.getElementById('availableArea').style.display === "none") {
            document.getElementById('availableArea').style.display = "block";
            document.getElementById('showMapbtn').value = "إخفاء"
        } else {
            document.getElementById('availableArea').style.display = "none";
            document.getElementById('showMapbtn').value = "استعراض الأماكن المشمولة في خدمة النقل"
        }

        // document.getElementById('availableArea').style.display = "block";
    }

</script>

@endsection
