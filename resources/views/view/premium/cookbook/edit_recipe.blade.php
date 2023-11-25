@extends('layouts.pages.cookbook')
@section('name', trans('cookbook.edit_recipe'))
@section('title', trans('cookbook.edit_recipe'))
@section('content')

<div class="container cookbook">
    <div class="row">
        <input type="hidden" value="{{$id}}">
        <div class="col-md-12 text-left">
            <h2>{{trans('cookbook.ingredients')}}</h2>
            <br />
            <div id="ingredientList">
                @foreach($recipe->ingredients as $ingredient)
                <div class="row row-container ingredient">
                    <input type="hidden" class="ingredient-id" value="{{$ingredient->id}}">
                    <div class="col-md-2">
                        <h4 class="raleway-font"><input type="text" class="form-control text-center quantity" placeholder="0" value="{{$ingredient->quantity}}"></h4>
                    </div>
                    <div class="col-md-3">
                        <select class="selectpicker" title="Type">
                            <option class="type" value="" {{isset($ingredient->type) ? 'selected' : ''}}>N/A</option>
                            <option class="type" value="cup" {{$ingredient->type == 'cup' ? 'selected' : ''}}>{{trans('cookbook.cup')}}</option>
                            <option class="type" value="tablespoon" {{$ingredient->type == 'tablespoon' ? 'selected' : ''}}>{{trans('cookbook.tablespoon')}}</option>
                            <option class="type" value="teaspoon" {{$ingredient->type == 'teaspoon' ? 'selected' : ''}}>{{trans('cookbook.teaspoon')}}</option>
                            <option class="type" value="oz" {{$ingredient->type == 'oz' ? 'selected' : ''}}>{{trans('cookbook.oz')}}</option>
                            <option class="type" value="pinch" {{$ingredient->type == 'pinch' ? 'selected' : ''}}>{{trans('cookbook.pinch')}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <h4 class="raleway-font"><input type="text" class="form-control name-fr" placeholder="{{trans('cookbook.ingredient')}} (FR)" value="{{$ingredient->name_fr}}"></h4>
                    </div>
                    <div class="col-md-3">
                        <h4 class="raleway-font"><input type="text" class="form-control name-en" placeholder="{{trans('cookbook.ingredient')}} (EN)" value="{{$ingredient->name_en}}"></h4>
                    </div>
                    <div class="col-md-1">
                        <h4 class="raleway-font"><button class="remove btn btn-danger" value="ingredient" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>
                    </div>
                </div>
                <br />
                @endforeach
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
                @foreach($recipe->steps as $key => $step)
                    <div class="row row-container step">
                        <input type="hidden" class="step-id" value="{{$step->id}}">
                        <div class="col-md-4">
                            <textarea type="text" class="form-control description-fr" placeholder="{{trans('cookbook.add_step')}} (FR)" rows="4">{{$step->text_fr}}</textarea>
                        </div>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control description-en" placeholder="{{trans('cookbook.add_step')}} (EN)" rows="4">{{$step->text_en}}</textarea>
                        </div>
                        <div class="col-md-3">
                            <select class="selectpicker level">
                                <option class="level" value="normal" {{(!$step->isWarning && !$step->isDanger) ? 'selected' : ''}}>{{trans('cookbook.normal')}}</option>
                                <option class="text-warning level" value="warning" {{$step->isWarning ? 'selected' : ''}}>{{trans('cookbook.warning')}}</option>
                                <option class="text-danger level" value="danger" {{$step->isDanger ? 'selected' : ''}}>{{trans('cookbook.critical')}}</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <h4 class="raleway-font"><button class="remove btn btn-danger" value="step" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>
                        </div>
                    </div>
                    <br />
                @endforeach
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
        $('#ingredientList').append(
            '<div class="row row-container ingredient">'+
                '<input type="hidden" class="ingredient-id" value="new">'+
                '<div class="col-md-2">'+
                    '<h4 class="raleway-font"><input type="text" class="form-control text-center quantity" placeholder="0"></h4>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<select class="selectpicker" title="Type">'+
                        '<option class="type" value="">N/A</option>'+
                        '<option class="type" value="cup">{{trans('cookbook.cup')}}</option>'+
                        '<option class="type" value="tablespoon">{{trans('cookbook.tablespoon')}}</option>'+
                        '<option class="type" value="teaspoon">{{trans('cookbook.teaspoon')}}</option>'+
                        '<option class="type" value="oz">{{trans('cookbook.oz')}}</option>'+
                        '<option class="type" value="pinch">{{trans('cookbook.pinch')}}</option>'+
                    '</select>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h4 class="raleway-font"><input type="text" class="form-control name-fr" placeholder="{{trans('cookbook.ingredient')}} (FR)"></h4>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h4 class="raleway-font"><input type="text" class="form-control name-en" placeholder="{{trans('cookbook.ingredient')}} (EN)"></h4>'+
                '</div>'+
                '<div class="col-md-1">'+
                    '<h4 class="raleway-font"><button class="remove btn btn-danger" value="ingredient" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>'+
                '</div>'+
            '</div>'+
            '<br />'
        );
        $(".selectpicker").selectpicker("render");
    });

    $('#addStep').on('click', function() {
        $('#stepsList').append(
            '<div class="row row-container step">'+
                '<input type="hidden" class="step-id" value="new">'+
                '<div class="col-md-4">'+
                    '<textarea type="text" class="form-control description-fr" placeholder="{{trans('cookbook.add_step')}} (FR)" rows="4"></textarea>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<textarea type="text" class="form-control description-en" placeholder="{{trans('cookbook.add_step')}} (EN)" rows="4"></textarea>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<select class="selectpicker level">'+
                        '<option class="level" value="normal" selected>{{trans('cookbook.normal')}}</option>'+
                        '<option class="text-warning level" value="warning">{{trans('cookbook.warning')}}</option>'+
                        '<option class="text-danger level" value="danger">{{trans('cookbook.critical')}}</option>'+
                    '</select>'+
                '</div>'+
                '<div class="col-md-1">'+
                    '<h4 class="raleway-font"><button class="remove btn btn-danger" value="step" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></h4>'+
                '</div>'+
            '</div>'+
            '<br />'
        );
        $(".selectpicker").selectpicker("render");
    });

    $('body').on('click', ".remove", function(e) {
        var id = $(this).attr('value');
        $(this).parents('.row-container').remove();
    });

    $('#submit').on('click', function() {
        var ingredients = [];
        var steps = [];
        $('.ingredient').each(function(key, value) {
            ingredients.push({
                'id': $(value).find('.ingredient-id')[0].value,
                'quantity': $(value).find('.quantity')[0].value,
                'type': $(value).find('.type:selected')[0].value,
                'order': key + 1,
                'name_fr': $(value).find('.name-fr')[0].value,
                'name_en': $(value).find('.name-en')[0].value
            });
        });
        $('.step').each(function(key, value) {
            steps.push({
                'id': $(value).find('.step-id')[0].value,
                'level': $(value).find('.level:selected')[0].value,
                'description_fr': $(value).find('.description-fr')[0].value,
                'description_en': $(value).find('.description-en')[0].value,
                'order': key + 1,
            });
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/recipe/edit',
            method: 'POST',
            data: {
                'id': $('#recipeID').val().
                'name_fr': $('#recipeNameFR').val(),
                'name_en': $('#recipeNameEN').val(),
                'author': $('#author').val(),
                'prep_time': $('#prepTime').val(),
                'cook_time': $('#cookTime').val(),
                'result': $('#result').val(),
                'description_fr': $('#descriptionFR').val(),
                'description_en': $('#descriptionEN').val(),
                'category': $('.category:selected').val(),
                'ingredients': ingredients,
                'steps': steps
            },

            beforeSend: function() {
                $('#submitContactForm').addClass('disabled');
                $('#submitContactForm').attr('disabled', '');
            },

            success: function() {
                toastr.success('Recipe saved', 'Recipe has been added with success.')
                $('#submitContactForm').removeClass('disabled');
                $('#submitContactForm').removeAttr('disabled', '');
                window.location.href = "/cookbook"
            },

            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to save your recipe.')
                $('#submitContactForm').removeClass('disabled');
                $('#submitContactForm').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });
</script>
@endsection