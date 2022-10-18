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
        @if(count($kiosk) > 0)
            <div class="col-md-12 text-center">
                @if($kiosk[0]->AvatarURL)
                    <img class="img-circle" src="{{$kiosk[0]->AvatarURL}}" width="100" />
                @else
                    <img class="img-circle" src="/img/no-avatar.jpg" width="100" />
                @endif
            </div>
            <div class="col-md-12 text-center">
                <h1><i>{{strtoupper($kiosk[0]->Firstname)}} {{strtoupper(substr($kiosk[0]->Lastname, 0, 1))}}.</i></h1>
                <h3>est en route vers le restaurant.</h3>
                <h5>{{$kiosk[0]->time}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                @foreach($kiosk as $key => $value)
                    @if($key >= 1)
                        <p><i>{{strtoupper($value->Firstname)}} {{strtoupper(substr($value->Lastname, 0, 1))}}. - {{$value->time}}</i></p>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <div class="col-md-12 text-center">
                <img class="img-circle" src="https://rotisseriesfusee.com/wp-content/uploads/2021/01/logo-fusee-1.png" width="100" />
            </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>En attente d'un livreur...</h3>
            </div>
        </div>
    @endif
</div>

@stop