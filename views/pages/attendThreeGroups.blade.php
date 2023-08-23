@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

@section('content')

<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644">تحضير فئة الفتيان</p>
        <div style="display: flex; justify-content: center;">
            <div class="attendClass"><a href="/attendClassThree">مجموعة رقم ( 1 )</a></div>
            <div class="attendClass"><a href="/attendClassThree">مجموعة رقم ( 2 )</a></div>
            <div class="attendClass"><a href="/attendClassThree">مجموعة رقم ( 3 )</a></div>
            <div class="attendClass"><a href="/attendClassThree">مجموعة رقم ( 4 )</a></div>
        </div>
    </div>
</div>


@endsection
