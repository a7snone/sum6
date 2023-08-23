@extends('layouts.master')

<!-- @section('pageTitle', 'التسجيل في خدمة النقل') -->

@section('content')


<?php $i=1;?>

@foreach($students as $value)

<table class='displayOrdersContainer'>
    <tr class='{{$value->st_class}}'>
        <form action="{{ url('update-student-info/'.$value->id) }}" method="POST">
            @csrf
            @method('PUT')
            @csrf
            <td><input class="btn btn-sm btn-default" type="label" value="{{$i++}}"></td>
            <td><input name="st_name" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_name}}"></td>
            <td><input name="st_class" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_class}}"></td>
            <td><input name="st_SN" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_SN}}"></td>  
            <td><input name="fKey" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->fKey}}"></td>  
            <td><input name="note1" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->note1}}"></td>  
            <td><input name="note2" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->note2}}"></td>  
            <td><input name="note3" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->note3}}"></td>  
            <td><input name="note4" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->note4}}"></td>  
            <td><input name="note5" style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->note5}}"></td>  
            <td><input style="margin-left:10px; float:left" class="btn btn-sm btn-success " type="submit" value="حفظ"></td>
        </form>
    </tr>
</table>
@endforeach





</script>

@endsection
