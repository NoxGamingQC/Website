@extends('layouts.app')
@section('title', 'Management - Modules')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Modules</h1>
        <hr />
            @foreach($modules as $module)
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="text-center">
                                <h4>{{ $module['icon'] }} {{$module['slug']}}</h4>
                                <hr />
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label>Module Status</label>
                                    </div>
                                    <div class="col-md-1">
                                        <select class="selectpicker">
                                            <option {{ !$module['isInMaintenance'] ? 'selected' : '' }}>Active</option>
                                            <option {{ $module['isInMaintenance'] ? 'selected' : '' }}>Disable (In maintenance)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label>Default Status</label>
                                    </div>
                                    <div class="col-md-1">
                                        <select class="selectpicker">
                                            <option {{ $module['isActiveDefault'] ? 'selected' : '' }}>Active</option>
                                            <option {{ !$module['isActiveDefault'] ? 'selected' : '' }}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@stop
