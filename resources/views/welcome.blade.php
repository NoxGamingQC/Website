@extends('layouts.app')
@section('title', 'Jimmy Béland-Bédard')
@section('content')

<div class="container text-justify my-auto">
    <div class="row py-5 align-items-center">
        <div class="col card card-body">
            <h2 class="display-4 font-weight-bold">
                {!! trans('welcome.name') !!}
                <br />
                <small>{!! trans('welcome.gamertag') !!}</small>
            </h2>

            <h5>{{ trans('welcome.slogan') }}</h5>
            <h6>{!! trans('welcome.having_fun') !!}</h6>
            <h6>{!! trans('welcome.has_knowledge') !!}</h6>
        </div>
    </div>
</div>

@endsection