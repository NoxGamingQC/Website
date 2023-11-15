@extends('layouts.pages.app')
@section('title', 'Management - Bot Activities')
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            <div class="col-md-10">
                <input type="text" class="form-control" id="newActivity" placeholder="New entry..." />
            </div>
            <div class="col-md-2">
                <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
            
<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            @foreach($activities as $key => $activity)
                <div class="col-md-4" style="margin-bottom: 25px">
                    <p id="{{$activity['name']}}"><button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button> {{$activity['name']}}</p> 
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
