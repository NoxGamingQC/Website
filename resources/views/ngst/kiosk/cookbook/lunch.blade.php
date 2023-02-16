@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.lunch'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/lunch/broccoli_cream"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.broccoli_cream')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/lunch/meat_loaf"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.meat_loaf')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/lunch/tomato_garlic_toast"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.tomato_garlic_toast')}}" readonly></a>
        </div>
    </div>
</div>

@endsection