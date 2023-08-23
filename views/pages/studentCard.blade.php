@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

@section('content')

<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644"> بطاقة الطالب التعريفية</p>
       
       <?php
       $QRr = 255;
       $QRg = 255;
       $QRb = 255;

       $QRlink = 'https://summer6.ngrok.app/qrInfo/'.$cardInfo[0]->fKey;
       
       $cardKind ='';
       $cardName='';
            if($cardInfo[0]->st_class == '1'){
                $cardKind ='studentCardOne';
                $cardName='براعم';
                $QRr = 100;
                $QRg = 200;
                $QRb = 160;
            }elseif($cardInfo[0]->st_class == '2'){
                $cardKind ='studentCardTow';
                $cardName='أشبال';
                $QRr = 230;
                $QRg = 190;
                $QRb = 100;
            }elseif($cardInfo[0]->st_class == '3'){
                $cardKind ='studentCardThree';
                $cardName='فتيان';
                $QRr = 100;
                $QRg = 190;
                $QRb = 230;
            }elseif($cardInfo[0]->st_class == '4'){
                $cardKind ='studentCardFour';
                $cardName='شباب';
                $QRr = 100;
                $QRg = 100;
                $QRb = 100;
            }
        ?>

       
        <!-- <img src="{{ URL::asset('/images/class1.bmp') }}" alt="" height="" width="60%"
    onclick="window.open('/')"> -->
    <!-- background-image: url("/assets/img/background.png")  -->
       
   
        <div class="{{$cardKind}}" onclick="window.location.href='../qrInfo/{{$cardInfo[0]->fKey}}'">
        <!-- <img src="{{ URL::asset('/images/'.$cardKind.'.bmp') }}" /> -->
        <!-- background-image: url({{asset('images/bg.jpg')}}); -->
            <p class="studentCardName">{{$cardInfo[0]->st_name}}</p>
            <p class="studentCardClass">{{$cardName}}</p>
            <!-- <div class="studentCardQR{{$cardKind}}">{!! QrCode::size(85)->generate('https://69926a3cc3c3.ngrok.app') !!}</div> -->
            <div class="QRcontainer">{!! QrCode::size(80)->color($QRr,$QRg,$QRb)->generate($QRlink) !!}</div>

            <p class="studentCardSN">{{$cardInfo[0]->st_SN}}</p>
        </div>
    </div>
</div>


@endsection
