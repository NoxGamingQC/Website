@extends('layouts.pages.maintenance')
@section('title', 'ERROR 503')
@section('content')

<div class="container py-5">
    <div class="row text-center py-5">
        <div class="col-12">
            <img src="/img/logo.png" style="max-width:300px;">
            <h1 class="text-danger">Section under maintenance</h1>
            <h4>This section is currently undergoing maintenance. It should be back shortly.</h4>
            <br />
            <hr />
            <br />
            <h1 class="text-danger">Section en maintenance</h1>
            <h4>Cette section est présentement en maintenance. Elle sera de retour bientôt.</h4>
            @if(app('request')->input('app_type') == 'mobile_app')
                <br />
                <br />
                <br />
                <input id="reloadPage" type="button" class="btn btn-info" value="reload">
            @endif
        </div>
    </div>
</div>
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
