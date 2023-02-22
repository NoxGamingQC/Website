@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.sugar_and_cream'))
@section('author', trans('cookbook.my_grandma'))
@section('prep_time', trans('cookbook.not_available'))
@section('cook_time', trans('cookbook.not_available'))
@section('yields', trans('cookbook.not_available'))
@section('description', trans('cookbook.not_available'))

<div class="container">
        <div class="col-md-12 text-right">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <br />
                   <input id="v1" class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="★ {{trans('cookbook.version')}} 1 ★" readonly>
                </div>
                <div class="col-sm-4 text-center">
                    <br />
                   <input id="v2" class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{trans('cookbook.version')}} 2" readonly>
                </div>
                <div class="col-sm-4 text-center">
                    <br />
                   <input id="v3" class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{trans('cookbook.version')}} 3" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container v1">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>2 tasses de sucre blanc</li>
                <li>1/4 de tasse de beurre ou margarine</li>
                <li>3/4 tasses de crème 35%</li>
                <li>16 guimauves</li>
                <li>1/2 tasses de noix hachée (facultatif)</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container v1">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Directives</h2>
            <br />
            <ul style="font-size:18px">
                <li class="text-justify">Dans une casserole mélangez les quatres premiers ingrédients.</li>
                <li class="text-justify">Amenez à ébullition 5 minutes environ.</li>
                <li class="text-justify">Enlevez la casserole du feu et ajoutez les noix au besoin.</li>
                <li class="text-justify">Mélangez.</li>
                <li class="text-justify">Versez dans une assiettes beurré et laissé refroidir, avant de coupez en carré.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>

<div class="container v2 hidden">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>1 tasse de sucre blanc</li>
                <li>1 tasse de cassonade pâle ou dorée</li>
                <li>1 tasse de crème 35% à fouetter</li>
                <li>1 c. à thé de beurre</li>
                <li>1/2 c. à thé de vanille</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container v2 hidden">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Directives</h2>
            <br />
            <ul style="font-size:18px">
                <li class="text-justify">Mélanger légèrement le sucre, la cassonade et la crème dans un bol en verre.</li>
                <li class="text-justify">Chauffer 10 minutes (environ) à "high" au micro-onde.</li>
                <li class="text-justify">Sortir le bol.</li>
                <li class="text-justify">Ajouter le beurre et la vanille.</li>
                <li class="text-justify">Mélanger au batteur électrique environ 4 minutes, à vitesse moyenne.</li>
                <li class="text-justify">Étendre dans un moule beurré et attendre que le contenu sois ferme avant de couper.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>


<div class="container v3 hidden">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>2 tasses de sucre</li>
                <li>2 tasses de cassonade</li>
                <li>2/3 de tasse de sirop de maïs</li>
                <li>1/4 de tasse de beurre</li>
                <li>6oz de lait évaporé</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container v3 hidden">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Directives</h2>
            <br />
            <ul style="font-size:18px">
                <li class="text-justify">Bien mélanger tous les ingrédients.</li>
                <li class="text-justify">Amener à ébullition.</li>
                <li class="text-justify">Cuire 3 minutes à feu vif.</li>
                <li class="text-justify">Refroidir en battant à la mixette à vitesse moyenne pendant 10 minutes.</li>
                <li class="text-justify">Étendre dans un moule beurré de 10 x 6 1/2 environ</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<script>
    $('#v1').on('click', function() {
        $('.v1').each(function() {
           $(this).removeClass('hidden');
        });
        $('.v2').each(function() {
           $(this).addClass('hidden'); 
        });
        $('.v3').each(function() {
           $(this).addClass('hidden'); 
        });
    });
    $('#v2').on('click', function() {
        $('.v1').each(function() {
           $(this).addClass('hidden');
        });
        $('.v2').each(function() {
           $(this).removeClass('hidden'); 
        });
        $('.v3').each(function() {
           $(this).addClass('hidden'); 
        });
    });
    $('#v3').on('click', function() {
        $('.v1').each(function() {
           $(this).addClass('hidden');
        });
        $('.v2').each(function() {
           $(this).addClass('hidden'); 
        });
        $('.v3').each(function() {
           $(this).removeClass('hidden'); 
        });
    });
</script>
@endsection