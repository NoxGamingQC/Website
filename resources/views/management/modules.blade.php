@extends('layouts.app')
@section('title', 'Management - Modules')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Modules</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                    @foreach($modules as $module)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <h4>{{$module['slug']}}</h4>
                                        <hr />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label>Module Status</label>
                                            </div>
                                            <div class="col-md-1">
                                                <select class="selectpicker">
                                                    <option>Active</option>
                                                    <option>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label>Active by Default</label>
                                            </div>
                                            <div class="col-md-1">
                                                <select class="selectpicker">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@stop
