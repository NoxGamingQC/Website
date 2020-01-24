@extends('layouts.app')
@section('title', 'Management - Bot Activities')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Bot Activities</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                @foreach($activities as $activity)
                    <p>{{$activity['name']}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
