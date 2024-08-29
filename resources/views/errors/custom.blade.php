@extends('layouts.pages.error')
@section('title', $title)
@section('slogan', (isset($slogan) ? $slogan : ''))
@section('content')


<div class="row">
    <div class="col-md-12 bg-dark content-item">
        <div class="container">
            <h1 class="raleway-font text-danger">{{$title}}</h3>
            <h3 class="raleway-font">{{$description}}</h3>
        </div>
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

@if(isset($redirect))
    <script type="text/javascript">
        $(document).ready(function() {
            window.location.href = "{{$redirect}}"
        })
    </script>
@endif
@endsection