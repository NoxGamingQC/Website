@extends('layouts.pages.cookbook')
@section('title', trans('cookbook.title'))
@section('kiosk-button')
@auth
    @if(Auth::user()->hasPermission('edit_recipe'))
        <div class="row">
            <div class="col-md-12">
                    <a href="/{{app()->getLocale()}}/recipe/edit/{{$recipe->id}}"><input class="btn btn-warning form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.edit_recipe')}}" readonly></a>
                <br />
                <br />
            </div>
        </div>
    @endif
@endauth
@endsection
@section('content')
@section('author',  $recipe->created_by ?  $recipe->author : trans('cookbook.unknown'))
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

<div class="container cookbook">
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
@if(count($recipe->steps) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <h2>{{trans('cookbook.steps')}}</h2>
                <br />
                <ul style="font-size:18px">
                @if(app()->getLocale() === 'fr-ca')
                        @foreach($recipe->steps as $key => $step)
                            <li class="text-justify {{$step->is_warning ? 'text-warning' : ''}} {{$step->is_danger ? 'text-danger' : ''}}">{{$step->text_fr}}</li>
                        @endforeach
                    @else
                        @foreach($recipe->steps as $key => $step)
                            <li class="text-justify {{$step->is_warning ? 'text-warning' : ''}} {{$step->is_danger ? 'text-danger' : ''}}">{{$step->text_en}}</li>
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
@endif
@if($recipe)
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <br /><br />
            <p>{{trans('cookbook.created_by') . ' '}}<a href="/user/{{$created_by}}">{{ $created_by }}</a> {{' ' . trans('cookbook.on') . ' ' . Carbon\Carbon::parse($recipe->created_at)->format('Y-m-d H:i:s')}}</p>
            <p>{{trans('cookbook.updated_by') . ' '}}<a href="/user/{{$updated_by}}">{{ $updated_by }}</a>{{' ' . trans('cookbook.on') . ' ' . Carbon\Carbon::parse($recipe->updated_at)->format('Y-m-d H:i:s')}}</p>
            <br /><br />
        </div>
    </div>
@endif
@endsection