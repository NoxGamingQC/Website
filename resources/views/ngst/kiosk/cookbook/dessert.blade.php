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
    </div>
</div>

@endsection