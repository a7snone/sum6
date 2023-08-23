@extends('layouts.master')

@section('content')

<div class="px-content">
<!-- <img src="{{ URL::to('/') }}images/flower.jpg') }}" style="height: 50px;width:100px;"> -->
<!-- <img src="{{ url('storage/uploadedImages/1689322195.jpg') }}" style="height: 50px;width:100px;">
<img src="{{ asset('/images/header.jpg') }}" style="height: 50px;width:100px;">
<img src="{{ url('/storage/images/3nLNOPwURJzwsSVt2RX6hxnuyo0dCH8ziVZX4m83.jpg') }}" style="height: 50px;width:100px;"> -->

<!-- $newName = $req->file('receipt')->store('public\images');  -->

<!-- {{ URL::to('/') }}/images/stackoverflow.png -->

</div>

<h1>{{ $students->st_name}}</h1>

<div class="px-content">
        <div class="page-header">
            <div class="row">
                <div class="col-md-4 text-xs-center text-md-left text-nowrap">
                    <h1>
                        <i class="px-nav-icon ion-android-apps"></i>Edit
                    </h1>
                </div>

                <hr class="page-wide-block visible-xs visible-sm">
                <!-- Spacer -->
                <div class="m-b-2 visible-xs visible-sm clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <form class="panel-body" action="/" method="POST">
                            @csrf
                            <fieldset class="form-group">
                            <label for="form-group-input-1">Firstname</label>
                                <input type="text" name="firstname" class="form-control" id="form-group-input-1" value="">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="form-group-input-1">Lastname</label>
                                <input type="text" name="valeur" class="form-control" id="form-group-input-1" value="">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="form-group-input-1">Page</label>
                                <input type="text" name="page" class="form-control" id="form-group-input-1" value="">
                            </fieldset>
                            <button type="submit" class="btn btn-primary pull-right">MAJ</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <form class="panel-body" action="/" method="POST">
        @csrf
        <fieldset class="form-group">
        <label for="form-group-input-1">Firstname</label>
            <input type="text" name="firstname" class="form-control" id="form-group-input-1" value="">
        </fieldset>
        <fieldset class="form-group">
            <label for="form-group-input-1">Lastname</label>
            <input type="text" name="valeur" class="form-control" id="form-group-input-1" value="">
        </fieldset>
        <fieldset class="form-group">
            <label for="form-group-input-1">Page</label>
            <input type="text" name="page" class="form-control" id="form-group-input-1" value="">
        </fieldset>
        <button type="submit" class="btn btn-primary pull-right">MAJ</button>
    </form>


    <div class="row">
    

        <form method="POST" action="/" accept-charset="UTF-8" style='width:100%;text-align:center; margin-top:20px; border:.1px solid #3332'>
            <!-- <input name="_token" type="hidden" value="cZl4Jt6ZNMAUJVhFa6ySN5P6MwMDHZyn6MQWxgvT"> -->
            <!-- <input name="partnum" type="hidden" value="A311PE"> -->
            <input class="btn btn-sm btn-default" type="label" value="الاسم">
            <input class="btn btn-sm btn-default" type="label" value="رقم الهوية">
            <input class="btn btn-sm btn-default" type="label" value="اسم المودع">
            <input class="btn btn-sm btn-default" type="label" value="رقم الحساب">
            <input class="btn btn-sm btn-default" type="label" value="موقع السكن">
            <img src="{{ url('storage/images/flower.jpg') }}" style="height: 50px;width:100px;">
            <input class="btn btn-sm btn-default" type="submit" value="اعتماد">
        </form>

        <form method="POST" action="/" accept-charset="UTF-8" style='width:100%;text-align:center; margin-top:20px; border:.1px solid #3332'>
            <!-- <input name="_token" type="hidden" value="cZl4Jt6ZNMAUJVhFa6ySN5P6MwMDHZyn6MQWxgvT"> -->
            <!-- <input name="partnum" type="hidden" value="A311PE"> -->
            <input class="btn btn-sm btn-default" type="label" value="الاسم">
            <input class="btn btn-sm btn-default" type="label" value="رقم الهوية">
            <input class="btn btn-sm btn-default" type="label" value="اسم المودع">
            <input class="btn btn-sm btn-default" type="label" value="رقم الحساب">
            <input class="btn btn-sm btn-default" type="label" value="موقع السكن">
            <img src="{{ url('storage/images/flower.jpg') }}" style="height: 50px;width:100px;">
            <input class="btn btn-sm btn-default" type="submit" value="اعتماد">
        </form>
        <form method="POST" action="/" accept-charset="UTF-8" style='width:100%;text-align:center; margin-top:20px; border:.1px solid #3332'>
            <!-- <input name="_token" type="hidden" value="cZl4Jt6ZNMAUJVhFa6ySN5P6MwMDHZyn6MQWxgvT"> -->
            <!-- <input name="partnum" type="hidden" value="A311PE"> -->
            <input class="btn btn-sm btn-default" type="label" value="الاسم">
            <input class="btn btn-sm btn-default" type="label" value="رقم الهوية">
            <input class="btn btn-sm btn-default" type="label" value="اسم المودع">
            <input class="btn btn-sm btn-default" type="label" value="رقم الحساب">
            <input class="btn btn-sm btn-default" type="label" value="موقع السكن">
            <img src="{{ url('storage/images/flower.jpg') }}" style="height: 50px;width:100px;">
            <input class="btn btn-sm btn-default" type="submit" value="اعتماد">
        </form>
</div>
@endsection

<!-- 
php artisan storage:link

INFO  The [C:\Users\HP\Desktop\WWW\sum63\public\storage] link has been connected to [C:\Users\HP\Desktop\WWW\sum63\storage\app/public].  op\WWW\sum63\storage\app/public].
-->

