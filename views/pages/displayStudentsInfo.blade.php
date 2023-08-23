@extends('layouts.master')

<!-- @section('pageTitle', 'التسجيل في خدمة النقل') -->

@section('content')


<?php $i=1;?>

@foreach($students as $value)
        <table class='displayOrdersContainer'>
            <tr class='{{$value->st_class}}' onclick="window.location.href='studentCard/{{$value->id}}'">
                <td><input class="btn btn-sm btn-default" type="label" value="{{$i++}}"></td>
                <td><input style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_name}}"></td>                
                <td><input style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_class}}"></td>                
                <td><input style='width:100%;' class="btn btn-sm btn-default" type="label" value="{{$value->st_SN}}"></td>                
            </tr>
        </table>
@endforeach






</script>

@endsection
