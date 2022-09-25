@extends('layouts.app')
@section('title', 'Management - Users')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Users</h1>
            <hr />
            @foreach($users as $user)
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="text-center">
                                @if($user['avatarURL'])
                                    <img class="img-circle" src="{{$user['avatarURL']}}" alt="{{$user['username']}}" title="{{$user['username']}}" width="100px" style="padding-bottom: 5px" />
                                @else
                                    <img class="img-circle" src="/img/no-avatar.jpg" alt="{{$user['username']}}" title="{{$user['username']}}" width="100px" style="padding-bottom: 5px" />
                                @endif
                                <h4><b>{{$user['username']}}{{ $user['isBOT'] ? ' [BOT]' : ''}}</b></h4>
                                <br />
                                <select class="selectpicker" id="gender" title="Gender">
                                    <option value="0" {{$user['grade'] == 'member' ? 'selected' : ''}}>Member</option>
                                    <option value="1" {{$user['grade'] == 'developper' ? 'selected' : ''}}>Developper</option>
                                    <option value="2" {{$user['grade'] == 'moderator' ? 'selected' : ''}}>Moderator</option>
                                    <option value="3" {{$user['grade'] == 'administrator' ? 'selected' : ''}}>Administrator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
