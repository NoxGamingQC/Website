@extends('layouts.pages.error')
@section('title', $title)
@section('slogan', (isset($slogan) ? $slogan : ''))
@section('content')


<div class="row">
    <div class="col-md-12 bg-dark content-item">
        <div class="container">
            <h3 class="raleway-font text-danger">{{$title}}</h3>
            <p class="raleway-font text-danger">{{$description}}</p>
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