@extends('layouts.master')

@section('content')

    <!-- <div style="display: flex; justify-content: center;">
    <h4 style="width:100%;background-color:#3333">الباص رقم (1)</h4>
        @foreach($busNo1 as $value)
        <div style="margin:10px; display:inline; width:20%; border: 1px solid #3333; text-align:center">
            <form>
                <p>1</p>
            </form>
        </div>
        @endforeach -->
<?php $j=0 ?>
<div class="bussDetailsContainer">

    <div class="busDetails">
        <p class="busDetailsTitle" onclick="window.location.href='busNoOne'">الباص رقم - 1</p>
        <?php $i=0; ?>
        @foreach($busNo1 as $value)
        <?php $i++;$j++; ?>
        <p class="width30 {{$value->note}}">{{$value->st_name}}</p>
        @endforeach
        <br><br><p style="color:blue; font-weight:bold;">عدد الركاب : {{$i}}</p>
    </div>
   
    <div class="busDetails">
        <p class="busDetailsTitle" onclick="window.location.href='busNoTow'">الباص رقم - 2</p>
        <?php $i=0; ?>
        @foreach($busNo2 as $value)
        <?php $i++;$j++; ?>
        <p class="{{$value->note}}">{{$value->st_name}}</p>
        @endforeach
        <br><br><p style="color:blue; font-weight:bold;">عدد الركاب : {{$i}}</p>
    </div>
   
    <div class="busDetails">
        <p class="busDetailsTitle" onclick="window.location.href='busNoThree'">الباص رقم - 3</p>
        <?php $i=0; ?>
        @foreach($busNo3 as $value)
        <?php $i++;$j++; ?>
        <p class="{{$value->note}}">{{$value->st_name}}</p>
        @endforeach
        <br><br><p style="color:blue; font-weight:bold;">عدد الركاب : {{$i}}</p>
    </div>
   
    <div class="busDetails">
        <p class="busDetailsTitle" onclick="window.location.href='busNoFour'">الباص رقم - 4</p>
        <?php $i=0; ?>
        @foreach($busNo4 as $value)
        <?php $i++;$j++; ?>
        <p class="{{$value->note}}">{{$value->st_name}}</p>
        @endforeach
        <br><br><p style="color:blue; font-weight:bold;">عدد الركاب : {{$i}}</p>
    </div>
   
    <div class="busDetails">
        <p class="busDetailsTitle" onclick="window.location.href='busNoEight'">الباص رقم - 8</p>
        <?php $i=0; ?>
        @foreach($busNo8 as $value)
        <?php $i++;$j++; ?>
        <p class="{{$value->note}}">{{$value->st_name}}</p>
        @endforeach
        <br><br><p style="color:blue; font-weight:bold;">عدد الركاب : {{$i}}</p>
    </div>
   
    <div class="busDetails">
        <br><br><p style="color:blue; font-weight:bold; background-color:#a897">عدد ركاب جميع الباصات : {{$j}}</p>
    </div>
    
</div>


<!-- display on table (old vertion) -->
<!-- <div style="display: flex; justify-content: center;">

    <div style=" margin:10px; display:inline; width:100%; border: 1px solid #3333; text-align:center">
    <p onclick="window.location.href='busNoOne'" style="width:100%;background-color:#368fa644">الباص رقم - 1</p>
    <?php $i=0; ?>
        @foreach($busNo1 as $value)
        <?php $i++; ?>
        <form action="{{ url('setDelivered/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <table style="width:100%">
            <tr style="width:100%"><td style="width:80%; border-bottom: 1px solid #3333">
            <p class="{{$value->note}}">{{$value->st_name}}</p>
            </td> -->
            <!-- <td style="width:20%; border-bottom: 1px solid #3333">
            <input style=" float:left" class="btn btn-sm btn-success " type="submit" value="تم التوصيل">
            </td> -->
        <!-- </tr>
        </table>

        </form>
        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div> -->


<!-- 
    <div style=" margin:10px; display:inline; width:100%; border: 1px solid #3333; text-align:center">
    <p onclick="window.location.href='busNoTow'" style="width:100%;background-color:#368fa644">الباص رقم - 2</p>
    <?php $i=0; ?>
        @foreach($busNo2 as $value)
        <?php $i++; ?>
        <form action="{{ url('setDelivered/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <table style="width:100%">
            <tr style="width:100%"><td style="width:80%; border-bottom: 1px solid #3333">
            <p class="{{$value->note}}">{{$value->st_name}}</p>
            </td>
          
        </tr>
        </table>

        </form>
        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div>

    <div style=" margin:10px; display:inline; width:30%; border: 1px solid #3333; text-align:center">
        <p onclick="window.location.href='busNoThree'" style="width:100%;background-color:#368fa644">الباص رقم - 3</p>
        <?php $i=0; ?>
        @foreach($busNo3 as $value)
        <?php $i++; ?>
        <form action="{{ url('setDelivered/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <table style="width:100%">
            <tr style="width:100%"><td style="width:80%; border-bottom: 1px solid #3333">
            <p class="{{$value->note}}">{{$value->st_name}}</p>
            </td>
           
        </tr>
        </table>

        </form>
        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div>
    <div style=" margin:10px; display:inline; width:30%; border: 1px solid #3333; text-align:center">
        <p onclick="window.location.href='busNoFour'" style="corser:pointer; width:100%;background-color:#368fa644">الباص رقم - 4</p>
        <?php $i=0; ?>
        @foreach($busNo4 as $value)
        <?php $i++; ?>
        <form action="{{ url('setDelivered/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <table style="width:100%">
            <tr style="width:100%"><td style="width:80%; border-bottom: 1px solid #3333">
            <p class="{{$value->note}}">{{$value->st_name}}</p>
            </td>
           
        </tr>
        </table>

        </form>
        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div>
    <div style=" margin:10px; display:inline; width:30%; border: 1px solid #3333; text-align:center">
        <p onclick="window.location.href='busNoEight'" style="corser:pointer; width:100%;background-color:#368fa644">الباص رقم - 8</p>
        <?php $i=0; ?>
        @foreach($busNo8 as $value)
        <?php $i++; ?>
        <form action="{{ url('setDelivered/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <table style="width:100%">
            <tr style="width:100%"><td style="width:80%; border-bottom: 1px solid #3333">
            <p class="{{$value->note}}">{{$value->st_name}}</p>
            </td>
         
        </tr>
        </table>

        </form>
        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div>
</div> -->


</div>


<div>
<div class="unDefineBusNo">
        <p style="width:100%;background-color:#368fa644">رقم الباص غير محدد</p>
        <?php $i=0; ?>
        @foreach($noBus as $value)
        <?php $i++; ?>
            <form action="{{ url('updateSetAreaCode/'.$value->id) }}" method="POST">
           
            @csrf
            @method('PUT')
            @csrf
            <table class="unDefineBusNo">
                <tr style="width:100%">
                    <td>
                        <!-- @csrf
                        @method('PUT')
                        @csrf -->
                        <td><input class="btn btn-sm btn-default" type="label" value="{{$value->st_name}}"></td>
                        <td><a class="btn btn-sm btn-default" type="label" href= "https://www.google.com/maps/?q={{$value->lat}},{{$value->lng}}">موقع السكن</a></td>
                        <td><input placeholder="رقم الباص" name="areaCode" class="btn btn-sm btn-default" type="label" value=""></td>
                        <td><input style="margin-left:10px; float:left" class="btn btn-sm btn-danger " type="submit" value="حفظ"></td>
                    </td>          
                </tr>
            </table>

            </form>

        

        @endforeach
        <br><br><br><p>عدد الركاب : {{$i}}</p>
    </div>
</div>

<!-- 
@foreach($busNo3 as $value)

    <div style=" margin:10px; display:inline; width:20%; border: 1px solid #3333; text-align:center">
        <form>
            <h4 style="width:100%;background-color:#3333">الباص رقم (3)</h4>
        </form>
    </div>

@endforeach -->

@endsection