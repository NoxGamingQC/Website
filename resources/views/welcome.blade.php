@extends('layouts.app')
@section('title', 'Jimmy Béland-Bédard')
@section('content')

<div class="container-fluid text-center my-auto">
    <div class="row py-5 align-items-center">
            <h2 class=" font-weight-bold">
                {!! trans('welcome.name') !!} <small>{!! trans('welcome.gamertag') !!}</small>
            </h2>

            <h6>{{ trans('welcome.slogan') }}</h6>
            <h6>{!! trans('welcome.has_knowledge') !!}</h6>
        </div>
</div>

@endsection