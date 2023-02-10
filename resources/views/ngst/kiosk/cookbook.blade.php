@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.title'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            @if(app()->getLocale() == 'fr-ca')
                <a href="/en-ca/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.english')}}" readonly></a>
            @elseif (app()->getLocale() == 'en-ca')
                <a href="/fr-ca/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.french')}}" readonly></a>
            @endif
            <br />
            &nbsp
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.breakfast')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/lunch"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.lunch')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.dessert')}}" readonly></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.drinks')}}" readonly></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>

@endsection