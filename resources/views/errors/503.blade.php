@extends('layouts.pages.maintenance')
@section('title', 'ERROR 503')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="/img/logo.png" width="300">
        <h1 class="text-danger">ERROR 503</h1>
        <h3 class="raleway-font">In maintenance.</h3>
        <br />
        <hr />
        <br />
        <h1 class="text-danger">ERREUR 503</h1>
        <h3 class="raleway-font">En maintenance.</h3>
        @if(app('request')->input('app_type') == 'mobile_app')
            <br />
            <br />
            <br />
            <input id="reloadPage" type="button" class="btn btn-info" value="reload">
        @endif
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
@if(app('request')->input('app_type') == 'mobile_app')
<script>
$('#reloadPage').on('click', function() {
    window.location.reload();
})
</script>
@endif
@endsection
