@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h1>Bingo - _card_type - _price_</h1>
        <div class="row">
            <div class="col-5">
                <table class="table table-striped">
                    <tr>
                        <th class="text-start">Nombre de boules sorties</th>
                        <td class="text-end">0</td>
                    </tr>
                    <tr>
                        <th class="text-start">Partie</th>
                        <td class="text-end">0</td>
                    </tr>
                    <tr>
                        <th class="text-start">Téléphone</th>
                        <td class="text-end">000-000-000</td>
                    </tr>
                </table>
            </div>
            <div class="col-3">
                <table class="table table-bordered">
                    <tr>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>
            <div class="col-2">
                <h1 id="timer">30</h1>
            </div>
             <div class="col-2">
                <h1 id="ball">0</h1>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th class="table-primary">B</th>
                        @for($i = 1; $i <= 15; $i++)
                            <td>{{ $i }}</td>
                        @endfor
                    <tr>
                    <tr>
                        <th class="table-danger">I</th>
                        @for($i = 16; $i <= 30; $i++)
                            <td>{{ $i }}</td>
                        @endfor
                    <tr>
                    <tr>
                        <th>N</th>
                        @for($i = 31; $i <= 45; $i++)
                            <td>{{ $i }}</td>
                        @endfor
                    <tr>
                    <tr>
                        <th class="table-success">G</th>
                        @for($i = 46; $i <= 60; $i++)
                            <td>{{ $i }}</td>
                        @endfor
                    <tr>
                    <tr>
                        <th class="table-warning">O</th>
                        @for($i = 61; $i <= 75; $i++)
                            <td>{{ $i }}</td>
                        @endfor
                    <tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Active ball: brand-danger -->
    <!-- Called ball: brand-muted -->
@endsection