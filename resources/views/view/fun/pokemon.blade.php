@extends('layouts.app')
@section('title', $pokemon->name_en)
@section('thumbnail', $pokemon->sprite_old)
@section('description', $pokemon->description_en)
@section('content')

<div class="row">
    <div class="container-fluid">
        <div class="col-md-3 col-md-offset-1" style="margin-top:12%;position:relative;">
                <img class="img img-circle" src="{{$pokemon->sprite_old}}" alt="{{$pokemon->name_en}}" title="{{$pokemon->name_en}}" width="100%" />
                <h1 class="raleway-font" style="font-size:24px"><b>{{$pokemon->name_en}}</b></h1>
        </div>
        <div class="col-md-7" style="margin-top:12%;position:relative;">
            <div class="panel panel-primary">
                <div class="panel-body">
                    {{ $pokemon->description_en }}
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <h3>More info</h3>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>ID: {{$pokemon->pokedex_number}}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@stop
