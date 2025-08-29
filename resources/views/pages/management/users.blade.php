@extends('layouts.pages.app')
@section('title', 'Management - Users')
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            <h1>User list</h1>
            <div class="col-md-12 table-responsive" style="padding-top:3%; padding-bottom:5%">
                <table class="table" style="border: 1px solid #CCC">
                    <thead>
                        <tr>
                            <th scope="col" class="col-md-1"><p>Avatar</p></th>
                            <th scope="col" class="col-md-3"><p>Username</p></th>
                            <th scope="col" class="col-md-3"><p>Role</p></th>
                            <th scope="col" class="col-md-1"><p>Edit</p></th>
                            <th scope="col" class="col-md-3"></th>
                            <th scope="col" class=" col-md-1"><p>Delete</p></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img class="img-round" src="{{$user['avatarURL']}}" style="width:50px !important"></td>
                            <td><p class="">{{$user['username']}}</p></td>
                            <td><p>{{$user['grade']}}</p></td>
                            <td><a class="btn btn-warning" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td></td>
                            <td><a class="btn btn-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
