@extends('layouts.app')
@section('title', $pokemon->name_en)
@section('thumbnail', $pokemon->sprite_old)
@section('description', $pokemon->description_en)
@section('content')

<div class="row">
    <div class="container-fluid">
        <div class="col-md-3 col-md-offset-1" style="margin-top:12%;position:relative;">
                <img class="img img-circle text-center" src="{{$pokemon->sprite_old}}" alt="{{$pokemon->name_en}}" title="{{$pokemon->name_en}}" width="60%" style="background-color:{{$pokemon->color}};"/>
                <h1 class="raleway-font" style="font-size:24px"><b>{{ucfirst($pokemon->name_en)}}</b></h1>
                <p>Pokédex entry # {{$pokemon->pokedex_number}}</p>
                <p>Type{{count(explode(';', $pokemon->types)) > 1 ? 's' : ''}}: {{str_replace(';', ', ', $pokemon->types)}}</p>
                <p>Height: {{$pokemon->height}}</p>
                <p>Weight: {{$pokemon->weight}}</p>
                <p>Capture rate: {{$pokemon->capture_rate}}</p>
                <p>Growth rate: {{$pokemon->growth_rate}}</p>
                <p>Abilitie{{count(explode(';', $pokemon->abilities)) > 1 ? 's' : ''}}: {{str_replace(';', ', ', $pokemon->abilities)}}</p>
        </div>
        <div class="col-md-7" style="margin-top:12%;position:relative;">
            <div class="panel panel-primary">
                <div class="panel-body">
                    {!! preg_replace('/\\\u([\da-fA-F]{4})/', '&#x\1;', $pokemon->description_en) !!}
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <h3>All sprites list</h3>
                <div class="row">
                    <div class="col-md-2">
                        <img class="img img-circle text-center" src="{{$pokemon->sprite_old}}" alt="{{$pokemon->name_en}}" title="{{$pokemon->name_en}}" width="100%" />
                    </div>
                    <div class="col-md-2">
                        <img class="img img-circle text-center" src="{{$pokemon->shiny_sprite_old}}" alt="Shiny {{$pokemon->name_en}}" title="Shiny {{$pokemon->name_en}}" width="100%" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@stop
