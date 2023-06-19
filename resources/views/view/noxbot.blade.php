@extends('layouts.app')
@section('title', 'NoxBOT')
@section('content')

<input type="hidden" id="id" value="{{ $serverConfig->id }}" />
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
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/en/noxbot',
            method: 'POST',
            data: {
                'id': $('#id').val(), 
                'bot': $('#Bot').is(':checked'),
                'info': $('#Info').is(':checked'),
                'roles': $('#Roles').is(':checked'),
                'giveaway': $('#Giveaway').is(':checked'),
                'management': $('#Management').is(':checked'),
                'ranking': $('#Ranking').is(':checked'),
                'music': $('#Music').is(':checked'),
                'miscs': $('#Miscs').is(':checked'),
                'links': $('#Links').is(':checked'),
                'twitch': $('#Twitch').is(':checked'),
                'games': $('#Games').is(':checked'),
            },
            beforeSend: function() {
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', '');
            },
            success: function() {
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
            },
            error: function (error) {
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });
    
</script>
@stop
