@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

@section('content')

<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644">تحضير الطلاب</p>
        <div style="display: flex; justify-content: center;">
            <div class="attendClass"><a href="/attendOneGroups">تحضير فئة البراعم</a></div>
            <div class="attendClass"><a href="/attendTowGroups">تحضير فئة أشبال</a></div>
            <div class="attendClass"><a href="/attendThreeGroups">تحضير فئة فتيان</a></div>
            <div class="attendClass"><a href="/attendFourGroups">تحضير فئة شباب</a></div>
        </div>
    </div>
</div>


@endsection
