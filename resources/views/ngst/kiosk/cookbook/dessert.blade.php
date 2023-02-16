@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.dessert'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/candy_no_cooking"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.candy_no_cooking')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/chocolate_cake_in_cup"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.chocolate_cake_in_cup')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/fruit_cake"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.fruit_cake')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/graham_cake"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.graham_cake')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/potato_candy"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.potato_candy')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/sugar_and_cream"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.sugar_and_cream')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/sugar_cone"><input class="btn btn-primary form-control" style="font-size:18px;padding:10%" value="{{trans('cookbook.sugar_cone')}}" readonly></a>
        </div>
    </div>
</div>

@endsection