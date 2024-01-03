@extends('layouts.pages.app')
@section('title', 'Management - Modules')
@section('content')

<div class="row bg-dark" style="padding-top:10%;padding-bottom:10%">
    <div class="col-md-12">
        <div class="container-fluid">
            @foreach($modules as $key => $module)
                <div class="col-md-4">
                    <div class="text-center">
                        <h4><b>{{ $module['icon'] }} {{$module['slug']}}</b></h4>
                        <br />
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
