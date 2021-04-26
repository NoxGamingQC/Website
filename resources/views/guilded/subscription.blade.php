@extends('layouts.app')
@section('title', trans('guilded.guilded_subscription'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('guilded.guilded_subscription')}}</h1>
            <hr />
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                        <h4>{{trans('guilded.copper')}}</h4>
                            <hr />
                            <ul>{!!trans('guilded.copper_description')!!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                        <h4>{{trans('guilded.silver')}}</h4>
                            <hr />
                            <ul>{!!trans('guilded.silver_description')!!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                        <h4>{{trans('guilded.gold')}}</h4>
                            <hr />
                            <ul>{!!trans('guilded.gold_description')!!}</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop