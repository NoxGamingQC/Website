@extends('layouts.noxgamingqc.app')
@section('content')

@if(app()->getLocale() === 'fr-ca')
    @section('name', $category->name_fr)
    @section('slogan', $category->description_fr ? $category->description_fr : '')
@else
    @section('name', $category->name_en)
    @section('slogan', $category->description_en ? $category->description_en : '')
@endif

<div class="container">
    <div class="row">
        @if(app()->getLocale() === 'fr-ca')
            @foreach($recipes as $key => $recipe)
                <div class="col-sm-4 text-center" style="margin-bottom:3%">
                    <a href="/{{app()->getLocale()}}/kiosk/recipe/{{$recipe->id}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$recipe->name_fr}}" readonly></a>
                </div>
            @endforeach
        @else
            @foreach($recipes as $key => $recipe)
                <div class="col-sm-4 text-center" style="margin-bottom:3%">
                    <a href="/{{app()->getLocale()}}/kiosk/recipe/{{$recipe->id}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$recipe->name_en}}" readonly></a>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection