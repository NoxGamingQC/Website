@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="container text-justify my-auto">
    <div class="row py-5 align-items-center">
        <div class="col">
            <h2>
                <b class="display-4">{!! trans('welcome.name') !!}</b>
                <br />
                <small class="text-body-secondary">{!! trans('welcome.gamertag') !!}</small>
            </h2>
            <h5>{{trans('welcome.slogan')}}</h5>
            <h6>{!! trans('welcome.having_fun') !!}</h6>
            <h6>{!! trans('welcome.has_knowledge') !!}</h6>
        </div>
    </div>
</div>
@endsection
