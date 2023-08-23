@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')

<div class="jumbotron">
    <h1 class="display-4">تواصل معنا..</h1>
    <p class="lead">كلام عن النادي الصيفي - 5 </p>
</div>

<form method="POST" action="/alert">
    @csrf
    <input name="message" type='text' placeholder='تواصل معنا من هنا'></input>    
    <input type='submit' ></input>    
</form>


@endsection
