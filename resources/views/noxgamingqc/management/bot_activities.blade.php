@extends('layouts.app')
@section('title', 'Management - Bot Activities')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Bot Activities</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="newActivity" placeholder="New entry..." />
                    </div>
                     <div class="col-md-6">
                        <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
                <br />
                @foreach($activities as $key => $activity)
                    <p id="{{$activity['name']}}">{{$activity['name']}}<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></p> 
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
