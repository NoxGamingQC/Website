@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.dessert'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
            <br />
            &nbsp
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/fruit_cake"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.fruit_cake')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/graham_cake"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.graham_cake')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/potato_candy"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.potato_candy')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert/sugar_cone"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.sugar_cone')}}" readonly></a>
        </div>
    </div>
</div>

@endsection