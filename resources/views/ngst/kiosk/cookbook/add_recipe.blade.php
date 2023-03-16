@extends('layouts.noxgamingqc.app')
@section('name', trans('cookbook.add_recipe'))
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>{{trans('cookbook.ingredients')}}</h2>
            <br />
            <div id="ingredientList">
            </div>
            <button id="addRecipe" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>{{trans('cookbook.steps')}}</h2>
            <br />
            <div id="StepsList">
            </div>
            <button id="addRecipe" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
@endsection