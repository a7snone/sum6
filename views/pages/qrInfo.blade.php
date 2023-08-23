@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

@section('content')

<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644"> معلومات الطالب التعريفية</p>

       <?php
       //$st_class = \App\Models\students_info::where('fKey',190)->st_class;//->lat;
       $st_class = \App\Models\students_info::where('fKey',190)->orderBy('created_at','DESC')->first()->st_class;
       $supervisorName = 'صالح العازمي';
       //$supervisorName = $st_class;
    //    if($st_class == '1'){
    //     $supervisorName = 'حمد الجضعان';
    //    }elseif($st_class == '2'){
    //     $supervisorName = 'عبدالاله البشري';
    //    }elseif($st_class == '3'){
    //     $supervisorName = 'عبدالله الحمدي';
    //    }elseif($st_class == '4'){
    //     $supervisorName = 'عبدالاله العبودي';
    //    }
    //    $QRr = 255;
    //    $QRg = 255;
    //    $QRb = 255;

    //    $QRlink = 'https://69926a3cc3c3.ngrok.app/qrInfo/'.$cardInfo[0]->st_SN;

    //    $cardKind ='';
    //    $cardName='';
    //         if($cardInfo[0]->st_class == '1'){
    //             $cardKind ='studentCardOne';
    //             $cardName='براعم';
    //             $QRr = 100;
    //             $QRg = 200;
    //             $QRb = 160;
    //         }elseif($cardInfo[0]->st_class == '2'){
    //             $cardKind ='studentCardTow';
    //             $cardName='أشبال';
    //             $QRr = 230;
    //             $QRg = 190;
    //             $QRb = 100;
    //         }elseif($cardInfo[0]->st_class == '3'){
    //             $cardKind ='studentCardThree';
    //             $cardName='فتيان';
    //             $QRr = 100;
    //             $QRg = 190;
    //             $QRb = 230;
    //         }elseif($cardInfo[0]->st_class == '4'){
    //             $cardKind ='studentCardFour';
    //             $cardName='شباب';
    //             $QRr = 100;
    //             $QRg = 100;
    //             $QRb = 100;
    //         }

        ?>



        <div class="qrStudentDetails" id="studentInfoContainer">
            <p class="">اسم الطالب : {{$cardInfo[0]->st_name}}</p>
            <p class="">رقم هوية الطالب : {{$cardInfo[0]->st_id}}</p>
            <p class="">رقم الجوال : {{$cardInfo[0]->st_mobile}}</p>
            <a class="" href= "https://www.google.com/maps/?q={{$cardInfo[0]->lat}},{{$cardInfo[0]->lng}}">انقر للانتقال لموقع السكن </a>
            <!-- <a class="" type="label" href= "https://www.google.com/maps/?q={{$cardInfo[0]->lat}},{{$cardInfo[0]->lng}}">موقع السكن</a> -->
            <p class="">جوال ولي الأمر: {{$cardInfo[0]->p_mobile}}</p>
            <p class="">رقم الباص : {{$cardInfo[0]->areaCode}}</p>
            <p class="">اسم المشرف : {{$supervisorName}}</p>
            <p class="">ملاحظات ولي الأمر : لا يوجد</p>
            <p class="">ملاحظات إدارة النادي : لا يوجد</p>
            <!-- <input placeholder="رقم الباص" class="btn btn-sm btn-default" type="label" value="{{$cardInfo[0]->areaCode}}"> -->
        </div>
        <div class="qrStudentDetails" id="privilage">
           <h1 style="color:#f88">لا تملك صلاحية للوصول لهذه البيانات</h1>
        </div>
    </div>
</div>
<script>
    let person = prompt("الرقم السري", "");

if (person == "121234") {
    document.getElementById("studentInfoContainer").style.display = "block";
    document.getElementById("privilage").style.display = "none";
  }else{
    document.getElementById("studentInfoContainer").style.display = "none";
    document.getElementById("privilage").style.display = "block";
  }
</script>

@endsection
