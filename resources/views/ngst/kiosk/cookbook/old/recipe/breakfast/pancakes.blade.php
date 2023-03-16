@extends('layouts.noxgamingqc.app')
@section('content')
@section('name','Pancakes')
@section('author', 'NoxGamingQC')
@section('yields', 'Fais 10-12 pancakes')
@section('prep_time', trans('cookbook.not_available'))
@section('cook_time', trans('cookbook.not_available'))
@section('description', trans('cookbook.not_available'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>1 1/3 tasse de farine</li>
                <li>3 c. à thé de poudre à pâte</li>
                <li>1/2 c. à thé de sel</li>
                <li>3 c. à table de sucre</li>
                <li>1 oeuf</li>
                <li>1 1/4 tasse de lait</li>
                <li>3 c. à table de beurre fondu ou huile</li>
                <li>1/4 c. à thé de vanille</li>
            </ul>
        </div>
    </div>
</div>

@endsection