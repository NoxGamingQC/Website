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
            <button id="addIngredient" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
            <div id="stepsList">
            </div>
            <button id="addStep" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
        <div class="col-md-12 text-right">
            <button id="submit" type="button" class="btn btn-success">{{trans('general.save')}}</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#addIngredient').on('click', function() {
        var ingredientCount = $('#ingredientList').children.length + 1;
        $('#ingredientList').append(
            '<div id="ingredient'+ ingredientCount +'" class="row">'+
                '<div class="col-md-2">'+
                    '<h4 class="raleway-font"><input id="quantity'+ ingredientCount  +'" type="text" class="form-control text-center" placeholder="0"></h4>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<select class="selectpicker" id="type'+ingredientCount+'" title="Type">'+
                        '<option value="cup">{{trans('cookbook.cup')}}</option>'+
                        '<option value="tablespoon">{{trans('cookbook.tablespoon')}}</option>'+
                        '<option value="teaspoon">{{trans('cookbook.teaspoon')}}</option>'+
                        '<option value="pinch">{{trans('cookbook.pinch')}}</option>'+
                    '</select>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h4 class="raleway-font"><input id="nameFR'+ ingredientCount +'" type="text" class="form-control" placeholder="{{trans('cookbook.ingredient')}} (FR)"></h4>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h4 class="raleway-font"><input id="nameEN'+ ingredientCount +'" type="text" class="form-control" placeholder="{{trans('cookbook.ingredient')}} (EN)"></h4>'+
                '</div>'+
                '<div class="col-md-1">'+
                    '<h4 class="raleway-font"><button class="remove btn btn-danger" value="ingredient'+ ingredientCount +'" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>'+
                '</div>'+
            '</div>'+
            '<br />'
        );
        $(".selectpicker").selectpicker("render");
    });

    $('#addStep').on('click', function() {
        var stepCount = $('#stepsList').children.length + 1;
        $('#stepsList').append(
            '<div id="step'+ stepCount +'" class="row">'+
                '<div class="col-md-4">'+
                    '<textarea id="descriptionFR'+ stepCount +'" type="text" class="form-control" placeholder="{{trans('cookbook.add_step')}} (FR)" rows="4"></textarea>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<textarea id="descriptionEN'+ stepCount +'" type="text" class="form-control" placeholder="{{trans('cookbook.add_step')}} (EN)" rows="4"></textarea>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<select class="selectpicker" id="type'+stepCount+'" title="level">'+
                        '<option value="normal" selected>{{trans('cookbook.normal')}}</option>'+
                        '<option class="text-warning" value="warning">{{trans('cookbook.warning')}}</option>'+
                        '<option class="text-danger" value="danger">{{trans('cookbook.critical')}}</option>'+
                    '</select>'+
                '</div>'+
                '<div class="col-md-1">'+
                    '<h4 class="raleway-font"><button class="remove btn btn-danger" value="step'+ stepCount +'" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>'+
                '</div>'+
            '</div>'+
            '<br />'
        );
        $(".selectpicker").selectpicker("render");
    });

    $('body').on('click',".remove", function(e){
        var id = $(this).attr('value');
        $(this).parents('#' + id).remove();
    });
</script>
@endsection