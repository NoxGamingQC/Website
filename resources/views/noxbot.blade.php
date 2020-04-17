@extends('layouts.reactLayout')
@section('title', 'NoxBOT')
@section('content')

<h1>NoxBOT</h1>
<hr />
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3>{{$serverConfig->name}}</h3>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Server aknowledgement</h4>
                            <br/>
                            <ul>
                                <li>ID: {{$serverConfig->ServerID}}</li>
                                <li>Current prefix: {{$serverConfig->Prefix}}</li>
                                <li>Timeout role ID: {{$serverConfig->TimeoutRoleID}}</li>
                            </ul>
                            <hr />
                        </div>
                        <div class="col-md-12">
                            <h4>Bot Modules</h4>
                            <br />
                            @foreach($serverSetting as $key => $value)
                                <div class="col-md-3">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            {{$value['icon']}} {{$key}}
                                            <hr />
                                            <label>Is Active: </label> <input type="checkbox" id="{{$key}}" value="{{$value['isActive']}}" {{ $value['isActive'] ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12 text-right">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#submit').click(function() {
        console.log('click');
    });
</script>
@stop
