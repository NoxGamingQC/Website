@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.breakfast'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_list')}}" readonly></a>
            <br />
            &nbsp
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast/crepes"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.crepes')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast/pancakes"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.pancakes')}}" readonly></a>
        </div>
    </div>
</div>

@endsection