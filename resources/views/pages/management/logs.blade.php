@extends('layouts.pages.app')
@section('title', trans('general.logs'))
@section('content')


<div class="row">
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            <form action="/{{app()->getLocale()}}/management/logs">
                <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}" />
                    <div class="input-group-btn">
                        <input type="submit" class="btn btn-primary" type="submit" value="{{trans('general.generate')}}">
                    </div>
                </div>
            </form>
            <span class="text-warning">{{trans('general.logs_limit')}}</span>
        </div>
    </div>
</div>
<div class="row bg-dark">
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            @if (empty($data['file']))
                <div>
                    <h3 class="text-center">{{trans('general.no_logs_found')}}</h3>
                </div>
            @else
                <div class="col-md-6">
                    <br />
                    <h5>{{trans('general.updated_on')}} <b>{{ $data['lastModified']->format('Y-m-d h:i a') }}</b></h5>
                    <h5>{{trans('general.file_size')}} <b>{{ round($data['size'] / 1024)}} KB</b></h5>
                </div>
                <div class="col-md-6 text-right">
                    <form action="/{{app()->getLocale()}}/management/logs/download">
                        <input class="hidden" type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}" />
                        <button class="btn btn-primary text-right" type="submit"><i id="navSearchButton" class="fa fa-download"></i> {{trans('general.download')}}</button>
                    </form>
                </div>
                <div class="col-md-12 table-responsive" style="padding-top:3%; padding-bottom:5%">
                    <table class="table" style="border: 1px solid #CCC">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-3"><p>Date</p></th>
                                <th scope="col" class="col-md-3"><p>Status</p></th>
                                <th scope="col" class="col-md-6"><p>Data</p></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data['file'] as $key => $value)
                            <tr>
                                <th scope="row"><p>{{array_key_exists($key, $data['elementsDates']) ? $data['elementsDates'][$key] : ''}}</p></th>
                                <td><p class="text-center badge-{{array_key_exists($key, $data['elementsStatusColor']) ? $data['elementsStatusColor'][$key] : ''}}" style="padding-top:10% !important; padding-bottom:10% !important;border-radius:5px !important;">{{array_key_exists($key, $data['elementsStatus']) ? $data['elementsStatus'][$key] : ''}}</p></td>
                                <td><p>{{$value}}</p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection