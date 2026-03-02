@extends('layouts.pages.app')
@section('title', trans('noxbot.select_server'))
@section('content')

<div class="row text-center" style="padding-top:18%">
    <div class="container">
        @foreach($servers as $server)
            <div class="col-md-{{$server->col_size}}">
                <a class="text-color" href="/{{app()->getLocale()}}/noxbot/dashboard/{{$server->discord_id}}" style="cursor:pointer">
                    <img class="img img-circle" src="{{$server->avatar_url}}" alt="{{$server->name}}" title="{{$server->name}}" width="150px" style="border: 1px solid #FFFFFF"/></h3>
                    <br />
                    <h2>{{$server->name}}</h2>
                    <br />
                    <br />
                </a>
            </div>
        @endforeach
        
    </div>
</div>
@stop
