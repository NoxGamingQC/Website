@extends('layouts.noxgamingqc.app')
@section('title', trans($item['name']))
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <p class="text-justify">{{$item['description'] ? $item['description'] : trans('general.no_description_available')}}</p>
            @if($item['variationsCount'] > 1)
                @foreach($item['variations'] as $key => $variation)
                    @if($variation->getItemVariationData()->getImageIds())
                        <img class="img-circle" src="{{$item['images'][$variation->getItemVariationData()->getImageIds()[0]]['url']}}" style="margin:2%;width:50px;height:50px">
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-6">
                <h3 class="raleway-font {{$item['price'] === 'variable' ? 'text-danger' : ''}}">
                    @if($item['price'] === 'variable')
                        {{trans('store.variable_price')}}
                    @else
                        {{trans('store.price')}}:&nbsp{{'C' . number_format(($item['price'] / 100), 2, ',', ' ') . '$' . $item['priceUnit']}}
                    @endif
                </h3>
            </div>
            <div class="col-md-6">
                <h3 class="raleway-font">{{trans('store.inventory')}}:&nbsp
                    <span class="text-warning">{{trans('general.available_soon')}}</span>
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection