@extends('layouts.app')
@section('title', $name . '\'s management')
@section('content')

<input type="hidden" id="serverID" value="{{$id}}">

<div class="row">
    <div class="container-fluid">
        <div class="col-md-3 col-md-offset-1" style="margin-top:12%;position:relative;">
                <img class="img img-circle" src="{{$avatar_url}}" alt="{{$name}}" title="{{$name}}" width="100%" />
                <h1 class="raleway-font" style="font-size:24px"><b>{!!$can_receive_points ? '<i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp' : '' !!}{{$name}}</b></h1>
                <h2 class="raleway-font text-muted" style="font-size:18px">{{trans('general.by') . ' @' . $owner_name}}</h2>
                <h3 class="raleway-font" style="font-size:16px">{{ trans('general.joined_on') . ' ' . $created_at }}</h3>
                <h3 class="raleway-font" style="font-size:16px">{{ trans('general.last_updated_on') . ' ' . $updated_at }}</h3>
                <h3 class="raleway-font form-inline" style="font-size:16px">{{ trans('noxbot.prefix') }}: <input type="text" class="form-control" placeholder="nb!" value="{{$prefix}}" /></h3>
        </div>
        <div class="col-md-7" style="margin-top:12%;position:relative;">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <textarea type="text" class="form-control" rows="25" style="resize: none;" placeholder="{{trans('general.enter_description_here')}}"></textarea>
                </div>
            </div>
            <div class="text-left">
                <h2 class="raleway-font" style="font-size:18px">{{trans('noxbot.enabled_module_label')}}</h2>
                <select class="selectpicker" multiple placeholder="{{trans('noxbot.all_modules_are_disabled')}}">
                    <optgroup label="Giveaways">
                        <option disabled>Giveaway</option>
                    </optgroup>
                    <optgroup label="Games">
                        <option>Minecraft</option>
                        <option>Pokémon</option>
                    </optgroup>
                    <optgroup label="Moderations">
                    </optgroup>
                    <optgroup label="Ranks">
                    </optgroup>
                    <optgroup label="Utilities">
                        <option>Help</option>
                        <option>Invite</option>
                        <option>Ping</option>
                        <option>Server</option>
                        <option>User</option>
                    </optgroup>
                    <optgroup label="Welcome">
                    </optgroup>
                </select>
            </div>
            <div class="text-right">
                <input type="button" class="btn btn-primary" value="{{trans('general.submit')}}" />
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@stop
