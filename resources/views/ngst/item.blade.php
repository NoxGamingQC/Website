@extends('layouts.ngst.app')
@section('title', trans($item['name']))
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <p class="text-justify">{{$item['description'] ? $item['description'] : trans('general.no_description_available')}}</p>
        </div>
    </div>
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-6">
                <h3 class="raleway-font">{{trans('store.price')}}:&nbsp</h3>
            </div>
            <div class="col-md-6">
                <h3 class="raleway-font">{{trans('store.inventory')}}:&nbsp</h3>
            </div>
        </div>
    </div>
</div>
@endsection