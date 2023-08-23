<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('pageTitle') | النادي الصيفي - 6</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="{{ URL::asset('styles/style.css') }}">

<!-- <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" /> -->

<style>
    tr:hover {
  background-color: #ee7;
}
.waiting{background-color: #98c4fa55;}
.approve{background-color: #98fad055;}
.disable{background-color: #faa29855;}

.headerTitle {
    padding-top: 50px;
    color: #2ad841;
    font-weight: bold;
    text-align: center;
    font-size: 30px;
}

.transferingDetails {
    margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 5%;
    margin-left: 5%;
    border: .2px solid #33333333;
    color: #0d2a46;
    font-weight: 400;
    text-align: right;
    font-size: 20px;
}

.doneMessage {
    color: #278b27;
}

.inputBox {
    font-size: 16px;
    color: #333;
    text-align: right;
}

.mainContainer {
    width: 100%;
    padding-right: 0%;
    text-align: right;
}

.btnShowAvailableAreas {
    width: 100%;
    height: 60px;
    margin-top: 20px;
    color: #4b9da8;
    border: 0 solid #000;
}

.footerContainer {
    margin-top: 200px;
    border: 1 solid #2ad841;
    width: 100%;
    height: 150px;
    background-color: #60cf73d6;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #60cf73b6;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #60af73b6;
}

.homePage{
    border: 1px solid #60af73b6;
    width:100%;
    text-align: center;
}
.onBus{
    color:#333;
    /* background-color:#56f09933; */
    /* background-color: #4b9da8; */
    text-align: center;
    display:inline;
}
.delivered{
    color:#333;
    background-color:#5d98dc33;
    /* background-color: #4b9da8; */
    text-align: center;
    display:inline;
}
.busActiveMapStudent{
    border-bottom: 2px solid #7777;
 
}
.studentStatusBtnContainer{
    font-size:10px;
    display: flex;
    justify-content: center;
}
.studentStatusBtn{
    width:95%;
    height:30px;
    background-color: #5565a6aa;
}
.studentStatusBtnAbsentee{
    float: left;
    margin-right:30px;
}
.activeMapInfoWindow{
    font-size:20px;
    text-align: center;
}
.bussDetailsContainer{
   
    text-align:center;
    /* display: flex; */
    justify-content: center;
    border: 0px solid #777;
    width:100%;
}
.busDetails{
    width:100%;
    border: 1px solid #666;
    margin-top:10px;
}
.busDetailsTitle{
    font-size:16px;
    font-weight: bold;
    
}
.studentInfoCapsule{
    background-color: #4b9da8;
    text-align: center;
    /* display:inline; */
}
.unDefineBusNo{
    width:100%;
    border: 0px solid #3333;
    margin:10px;
    display:inline;
    text-align:center
}
.studentStatusLayout{
    /* background-color:#6a94; */
    /* border: 1px solid #333; */
    color:#396;
    font-size:12px;
}


.takedFromHome{
    /* background-color:#60cf73b6; */
    background-color:#ebe95f;
}
.takedFromClub{
    background-color:#6a94;
}
.deliverToClub{
    background-color:#337abb;
    color:#eee;
}
.deliverBackHome{
    /* background-color:#ebe95f; */
    background-color:#60cf73b6;
    color:#333;
}
.Absentee{
    background-color:#e26969a3;
    color:#333;
}

.displayOrdersContainer{
    width:100%;
}
.busActive_st_name{
    font-size:16px;
    font-weight:bold;
}

.studentCardOne{
    font-size:11px;
    width:204px;
    height: 325px;
    border: 0px solid #6ac;
    text-align: center;
    display:block;
    margin-right:45%;
    padding-top:140px;
    color:#eee;
    font-weight: bold;
    background-image: url('/storage/images/studentCardOne.bmp');
}

.studentCardTow{
    font-size:11px;
    width:204px;
    height: 325px;
    border: 0px solid #6ac;
    text-align: center;
    display:block;
    margin-right:45%;
    padding-top:140px;
    color:#eee;
    font-weight: bold;
    background-image: url('/storage/images/studentCardTow.bmp');
}

.studentCardThree{
    font-size:11px;
    width:204px;
    height: 325px;
    border: 0px solid #6ac;
    text-align: center;
    display:block;
    margin-right:45%;
    padding-top:140px;
    color:#eee;
    font-weight: bold;
    background-image: url('/storage/images/studentCardThree.bmp');
}

.studentCardFour{
    font-size:11px;
    width:204px;
    height: 325px;
    border: 0px solid #6ac;
    text-align: center;
    display:block;
    margin-right:45%;
    padding-top:140px;
    color:#eee;
    font-weight: bold;
    background-image: url('/storage/images/studentCardFour.bmp');
    /* background-image: url("/assets/img/background.png"); */
    /* background-image: url({{asset('/storage/images/class1.bmp')}}); */
    /* background: url('/images/backgrounds/Coworking.JPG'); */
    
}
.studentCardName{
    padding-top:12px;
    font-size:11px;
    color:#ddd;
    font-weight: bold;
}
.studentCardSN{
    color:#777;
    padding-top:0px
}
.QRcontainer{
    padding-top:4px;
}
.qrStudentDetails{
    padding:20px;
    color: #69b;
    border: 2px solid #aea6;
    margin-right:20%;
    margin-left:20%;
    background-color: #aea1;
    /* padding-right:45%; */
    /* text-align: right; */
}


</style>