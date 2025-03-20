@extends('layouts.pages.error')
@section('title', 'ERROR 500')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="{{$logo}}" width="300" style="margin-top:10%">
        <h1>{{$name}}</h1>
        <h3>819-852-8705</h3>
        <hr />
        <h2 class="text-danger">{{$title}}</h2>
        <h3 class="raleway-font">{{$description}}</h3>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
@include('layouts.components.footer')
<script>  
    setTimeout(function(){
        window.location.reload();
    }, 2000);
</script>
@endsection
