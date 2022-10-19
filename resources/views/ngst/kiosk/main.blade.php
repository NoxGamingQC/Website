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
             @if($company->language === "fr")
                <h3>est en route vers le restaurant.</h3>
            @elseif($company->language === "en")
                <h3>is on his/her way to the restaurant.</h3>
            @endif
            <h5>{{$kiosk[0]->time}}</h5>
        </div>
        <div class="col-md-12 text-right">
            @foreach($kiosk as $key => $value)
                @if($key >= 1)
                    <p><i>{{strtoupper($value->Firstname)}} {{strtoupper(substr($value->Lastname, 0, 1))}}. - {{$value->time}}</i></p>
                @endif
            @endforeach
        </div>
        @else
            <div class="col-md-12 text-center">
                <img class="img-circle" src="{{$company->logoURL}}" width="100" />
            </div>
            <div class="col-md-12 text-center">
                @if($company->language === "fr")
                    <h3>En attente d'un livreur...</h3>
                @elseif($company->language === "en")
                    <h3>Waiting for a driver...</h3>
                @endif
            </div>
        @endif
    </div>
</div>

@stop