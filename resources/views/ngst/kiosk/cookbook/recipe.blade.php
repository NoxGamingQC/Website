@extends('layouts.noxgamingqc.app')
@section('content')
@section('author',  $recipe->created_by ?  $recipe->created_by : trans('cookbook.not_available'))
@section('prep_time', $recipe->prep_time ? $recipe->prep_time : trans('cookbook.not_available'))
@section('cook_time', $recipe->cook_time ? $recipe->cook_time : trans('cookbook.not_available'))
@section('yields', $recipe->result ? $recipe->result : trans('cookbook.not_available'))
@if(app()->getLocale() === 'fr-ca')
    @section('name', $recipe->name_fr)
    @section('description', $recipe->description_fr ? $recipe->description_fr : trans('cookbook.not_available'))
@else
    @section('name', $recipe->name_en)
    @section('description',  $recipe->description_en ? $recipe->description_en : trans('cookbook.not_available'))
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>{{trans('cookbook.ingredients')}}</h2>
            <br />
            <ul style="font-size:18px">
                @if(app()->getLocale() === 'fr-ca')
                    @foreach($recipe->ingredients as $key => $ingredient)
                        <li>{{$ingredient->quantity}} {{trans('cookbook.' . $ingredient->type)}} {{$ingredient->name_fr}}</li>
                    @endforeach
                @else
                    @foreach($recipe->ingredients as $key => $ingredient)
                        <li>{{$ingredient->quantity}} {{trans('cookbook.' . $ingredient->type)}} {{$ingredient->name_en}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>{{trans('cookbook.steps')}}</h2>
            <br />
            <ul style="font-size:18px">
            @if(app()->getLocale() === 'fr-ca')
                    @foreach($recipe->steps as $key => $step)
                        <li class="text-justify {{$step->isWarning ? 'text-warning' : ''}} {{$step->isDanger ? 'text-danger' : ''}}">{{$step->text_fr}}</li>
                    @endforeach
                @else
                    @foreach($recipe->steps as $key => $step)
                        <li class="text-justify {{$step->isWarning ? 'text-warning' : ''}} {{$step->isDanger ? 'text-danger' : ''}}">{{$step->text_en}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
@endsection