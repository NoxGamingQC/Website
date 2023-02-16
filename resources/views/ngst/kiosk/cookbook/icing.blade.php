@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.icing'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/icing/simple_icing"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.simple_icing')}}" readonly></a>
        </div>
    </div>
</div>

@endsection