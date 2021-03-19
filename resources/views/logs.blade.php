@extends('layouts.app')
@section('title', 'Logs')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="/{{app()->getLocale()}}/management/logs">
            <div class="input-group date" data-provide="datepicker">
                <input class="form-control" type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}" />
                <div class="input-group-btn">
                    <button type="button" class="btn btn-primary" type="submit">Generate</button>
                </div>
            </div>
        </form>
        <hr />
        @if (empty($data['file']))
            <div>
                <h3>No Logs Found</h3>
            </div>
        @else
            <div>
                <h5>Updated On : <b>{{ $data['lastModified']->format('Y-m-d h:i a') }}</b></h5>
                <h5>File Size : <b>{{ round($data['size'] / 1024)}} KB</b></h5>
                <pre>{{ $data['file'] }}</pre>
            </div>
        @endif
    </div>
</div>
@stop