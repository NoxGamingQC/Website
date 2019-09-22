@extends('layouts.app')
@section('title', 'Management - Users')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Users</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                @foreach($users as $user)
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h4>{{$user['username']}}{{ $user['isBOT'] ? ' [BOT]' : ''}}</h4>
                                    <hr />
                                    <p>{{$user['grade']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
