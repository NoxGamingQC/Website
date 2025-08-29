@extends('layouts.pages.app')
@section('title', 'Management - Modules')
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            <h1>Modules list</h1>
            <div class="col-md-12 table-responsive" style="padding-top:3%; padding-bottom:5%">
                <table class="table" style="border: 1px solid #CCC">
                    <thead>
                        <tr>
                            <th scope="col" class="col-md-1"><p>Icon</p></th>
                            <th scope="col" class="col-md-1"><p>Name</p></th>
                            <th scope="col" class="col-md-3"><p>Status</p></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $key => $module)
                        <tr>
                            <td><p class=""> {{ $module['icon'] }}</p></td>
                            <td><p class=""> {{ $module['slug'] }}</p></td>
                            <td>
                                <select class="selectpicker">
                                    <option {{ !$module['isInMaintenance'] ? 'selected' : '' }}>Active</option>
                                    <option {{ $module['isInMaintenance'] ? 'selected' : '' }}>Disable (In maintenance)</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
