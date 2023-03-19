@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.title'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            @if(app()->getLocale() == 'fr-ca')
                <a href="/en-ca/kiosk/cookbook{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:5%" value="{{trans('cookbook.english')}}" readonly></a>
            @elseif (app()->getLocale() == 'en-ca')
                <a href="/fr-ca/kiosk/cookbook{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:5%" value="{{trans('cookbook.french')}}" readonly></a>
            @endif
            <br />
            &nbsp
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        @if(app()->getLocale() === 'fr-ca')
            @foreach($categories as $key => $category)
                <div class="col-sm-4 text-center" style="margin-bottom:3%">
                    <a href="/{{app()->getLocale()}}/kiosk/cookbook/{{$category->id}}{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$category->name_fr}}" readonly></a>
                </div>
            @endforeach
        @else
            @foreach($categories as $key => $category)
                <div class="col-sm-4 text-center" style="margin-bottom:3%">
                    <a href="/{{app()->getLocale()}}/kiosk/cookbook/{{$category->id}}{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$category->name_en}}" readonly></a>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
@if(isset($redirect))
    <script type="text/javascript">
        $(document).ready(function() {
            window.location.href = "{{$redirect}}"
        })
    </script>
@endif
@endsection