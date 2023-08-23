@extends('layouts.master')

@section('content')
<?php
$i = 1;
?>
@foreach($students as $value)
        <table class='displayOrdersContainer'>
            <tr class='{{$value->status}}'>
            <form action="{{ url('update-student/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
                <td><input class="btn btn-sm btn-default" type="label" value="{{$i++}}"></td>
                <td><input  class="btn btn-sm btn-default" type="label" value="{{$value->st_name}}"></td>
                <td><input  class="btn btn-sm btn-default" type="label" value="{{$value->id}}"></td>
                <!-- <td><input class="btn btn-sm btn-default" type="label" value="{{$value->lat}}{{$value->lng}}"></td> -->
                <td><input class="btn btn-sm btn-default" type="label" value="ايصال الدفع" 
                onclick="window.location.href= '{{ url('storage/uploadedImages/'.$value->receipt) }}'">
                </td>
                <td><a class="btn btn-sm btn-default" type="label" href= "https://www.google.com/maps/?q={{$value->lat}},{{$value->lng}}">موقع السكن</a></td>
                <?php
                $studentStatus ='';
                $studentNote='';
                if($value->status == 'approve'){
                    $studentStatus = 'معتمد';
                }
                if($value->note =='deliverBackHome'){
                    $studentNote='تم التوصيل للمنزل';
                }elseif($value->note =='deliverToClub'){
                    $studentNote='تم التوصيل لمقر النادي';
                }elseif($value->note =='takedFromHome'){
                    $studentNote='تم الاستلام من المنزل';
                }elseif($value->note =='takedFromClub'){
                    $studentNote='تم الاستلام من مقر النادي';
                }elseif($value->note =='Absentee'){
                    $studentNote='غائب';
                }
                ?>
                <td><input class="btn btn-sm btn-default" type="label" value="{{$studentStatus}}"></td>
                <td><input class="{{$value->note}} btn btn-sm btn-default" type="label" value="{{$studentNote}}"></td>
                <td><input placeholder="رقم الباص" name="areaCode" class="btn btn-sm btn-default" type="label" value="{{$value->areaCode}}"></td>
                <td><input style="margin-left:10px; float:left" class="btn btn-sm btn-success " type="submit" value="حفظ"></td>
            </form>
            <form action="{{ url('updateDelete-student/'.$value->id) }}" method="POST">
                @csrf
                @method('PUT')
                @csrf
                <td><input style="margin-left:10px; float:left" class="btn btn-sm btn-danger " type="submit" value="حذف"></td>
            </form>
            </tr>
        </table>
@endforeach
@endsection
