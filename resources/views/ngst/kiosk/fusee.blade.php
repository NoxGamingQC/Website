@extends('layouts.kiosk')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
        </div>
        <div class="col-md-12 text-center">
            @if($kiosk[0]->AvatarURL)
                <img class="img-circle" src="{{$kiosk[0]->AvatarURL}}" width="100" />
            @else
                <img class="img-circle" src="/img/no-avatar.jpg" width="100" />
            @endif
        </div>
        <div class="col-md-12 text-center">
            <h1><i>{{$kiosk[0]->Firstname}} {{substr($kiosk[0]->Lastname, 0, 1)}}.</i></h1>
            <h3>est en route vers le restaurant.</h3>
            <h5>{{$kiosk[0]->time}}</h5>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-right">
            @foreach($kiosk as $key => $value)
                @if($key >= 1)
                    <p><i>{{$value->Firstname}} {{substr($value->Lastname, 0, 1)}}. - {{$value->time}}</i></p>
                @endif
            @endforeach
        </div>
    </div>
</div>

@stop