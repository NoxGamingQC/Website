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
                                    <img class="img img-circle status-{{$user['state']}}" src="{{$user['avatarURL']}}" alt="{{$user['username']}}" title="{{$user['username']}}" width="100px" />
                                @else
                                    <img class="img img-circle status-{{$user['state']}}" src="/img/no-avatar.jpg" alt="{{$user['username']}}" title="{{$user['username']}}" width="100px" />
                                @endif
                                <h4>
                                    <b>
                                        @if($user['isPremium'])
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                         @endif   
                                        {{$user['username']}}{{ $user['isBOT'] ? ' [BOT]' : ''}}
                                        @if($user['isVerified'])
                                        <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                        @endif
                                    </b>
                                </h4>
                                <br />
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <select class="selectpicker" id="grade-{{$user['id']}}" title="Grade">
                                            <option value="0" {{$user['grade'] == 'member' ? 'selected' : ''}}>Member</option>
                                            <option value="1" {{$user['grade'] == 'developper' ? 'selected' : ''}}>Developper</option>
                                            <option value="2" {{$user['grade'] == 'moderator' ? 'selected' : ''}}>Moderator</option>
                                            <option value="3" {{$user['grade'] == 'administrator' ? 'selected' : ''}}>Administrator</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="country">Country: </label>
                                    </div>
                                    <div class="col-md-9">
                                            <input type="text" class="form-control" id="country-{{$user['id']}}" placeholder="Country" value="{{$user['country']}}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Bot: </label><input type="checkbox" id="isBOT-{{$user['id']}}" value="{{$user['isBOT'] }}" {{ $user['isBOT'] ? 'checked' : '' }} />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email subs: </label> <input type="checkbox" id="isEmailSubs-{{$user['id']}}" value="{{$user['isEmailSubscriber'] }}" {{ $user['isEmailSubscriber'] ? 'checked' : '' }} />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="country">Discord ID: </label>
                                    </div>
                                    <div class="col-md-8">
                                            <input type="text" class="form-control" id="discordID-{{$user['id']}}" placeholder="Discord ID" value="{{$user['discordID']}}" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label>Discord Name: </label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="discordName-{{$user['id']}}" placeholder="Discord name" value="{{$user['discordName']}}" />
                                            </div>
                                            <div class="col-md-1">
                                                <p>#</p>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="discriminator-{{$user['id']}}" placeholder="0000" value="{{$user['discriminator']}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="col-md-6 text-left">
                                    <a class="btn btn-primary" href="/{{app()->getLocale()}}/profile/show/{{$user['id']}}">View</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-success disabled" id="{{$user['id']}}" type="button" disabled>Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
