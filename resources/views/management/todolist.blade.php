@extends('layouts.app')
@section('title', 'Management - Tasks')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Tasks</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="newTask" placeholder="New entry..." />
                    </div>
                     <div class="col-md-6">
                        <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-md-12">
                        <br />
                    </div>
                    <div class="col-md-12">
                        <input type="button" class="btn btn-primary" id="filterAll" value="All" />
                        <input type="button" class="btn btn-primary" id="filterInProgress" value="In Progress" />
                        <input type="button" class="btn btn-primary" id="filterPending" value="Pending" />
                        <input type="button" class="btn btn-primary" id="filterCompleted" value="Completed" />
                    </div>
                    <div class="col-md-12">
                        <br />
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="all">
                            <ul>
                                @foreach ($tasks as $key => $task)
                                    <li>{{$task->text}}
                                    @foreach ($flags[$task->id] as $key => $flag)
                                        <input type="button" class="btn btn-primary" value="{{$flag}}" disabled />
                                    @endforeach <button class="btn btn-danger" id="{{$task->id}}"><i class="fa fa-times" aria-hidden="true"></i></button></li>
                                    <br />
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12" id="inProgress" hidden>
                            <ul>
                                @foreach ($inProgressTasks as $key => $task)
                                    <li>{{$task->text}}
                                    @foreach ($flags[$task->id] as $key => $flag)
                                        <input type="button" class="btn btn-primary" value="{{$flag}}" disabled />
                                    @endforeach <button class="btn btn-danger" id="{{$task->id}}"><i class="fa fa-times" aria-hidden="true"></i></button></li>
                                    <br />
                                @endforeach
                            </ul>
                        </div>
                         <div class="col-md-12" id="pending" hidden>
                            <ul>
                                @foreach ($pendingTasks as $key => $task)
                                    <li>{{$task->text}}
                                    @foreach ($flags[$task->id] as $key => $flag)
                                        <input type="button" class="btn btn-primary" value="{{$flag}}" disabled />
                                    @endforeach <button class="btn btn-danger" id="{{$task->id}}"><i class="fa fa-times" aria-hidden="true"></i></button></li>
                                    <br />
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12" id="completed" hidden>
                            <ul>
                                @foreach ($completedTasks as $key => $task)
                                    <li>{{$task->text}}
                                    @foreach ($flags[$task->id] as $key => $flag)
                                        <input type="button" class="btn btn-primary" value="{{$flag}}" disabled />
                                    @endforeach <button class="btn btn-danger" id="{{$task->id}}"><i class="fa fa-times" aria-hidden="true"></i></button></li>
                                    <br />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>
@stop
