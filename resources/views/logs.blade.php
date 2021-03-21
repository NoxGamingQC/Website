@extends('layouts.app')
@section('title', trans('generic.logs'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="/{{app()->getLocale()}}/management/logs">
            <div class="input-group date" data-provide="datepicker">
                <input class="form-control" type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}" />
                <div class="input-group-btn">
                    <input type="submit" class="btn btn-primary" type="submit" value="{{trans('generic.generate')}}">
                </div>
            </div>
        </form>
        <span class="warning-text">{{trans('generic.logs_limit')}}</span>
        <hr />
        @if (empty($data['file']))
            <div>
                <h3>{{trans('generic.no_logs_found')}}</h3>
            </div>
        @else
            <div class="col-md-6">
                <br />
                <h5>{{trans('generic.updated_on')}} <b>{{ $data['lastModified']->format('Y-m-d h:i a') }}</b></h5>
                <h5>{{trans('generic.file_size')}} <b>{{ round($data['size'] / 1024)}} KB</b></h5>
            </div>
            <div class="col-md-6 text-right">
                <form action="/{{app()->getLocale()}}/management/logs/download">
                    <input class="hidden" type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}" />
                    <button class="btn btn-primary text-right" type="submit"><i id="navSearchButton" class="fa fa-download"></i> {{trans('generic.download')}}</button>
                </form>
            </div>
            <div class="col-md-12">
                <pre>{{ $data['file'] }}</pre>
            </div>
        @endif
    </div>
</div>
@stop