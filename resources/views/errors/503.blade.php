@extends('layouts.pages.maintenance')
@section('title', 'ERROR 503')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="/img/logo.png" width="300">
        <h3 class="raleway-font">ERROR 503 | In maintenance.</h3>
        <br />
        <hr />
        <br />
        <h3 class="raleway-font">ERREUR 503 | En maintenance.</h3>
        @if(app('request')->input('app_type') == 'mobile_app')
            <br />
            <br />
            <br />
            <input id="reloadPage" type="button" class="btn btn-info" value="reload">
        @endif
    </div>
</div>
@if(app('request')->input('app_type') == 'mobile_app')
<script>
$('#reloadPage').on('click', function() {
    window.location.reload();
})
</script>
@endif
@endsection
