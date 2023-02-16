@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.drinks'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks/cosmopolitan"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.cosmopolitan')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks/daquiri"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.daquiri')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks/kamikaze"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.kamikaze')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks/rob_roy"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.rob_roy')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks/screwdriver"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.screwdriver')}}" readonly></a>
        </div>
    </div>
</div>

@endsection