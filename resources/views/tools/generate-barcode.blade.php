@extends('layouts.app')
@section('title', trans('tools.generate_barcode'))
@section('slogan', trans('tools.generate_barcode_description'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 no-print">
            <h1>Générateur de code barre</h1>
        </div>
        <form  class="no-print" method="POST" action="/{{app()->getLocale()}}/tools/generate-barcode">
            @csrf
            <div class="col-md-12">
                <textarea
                    name="list"
                    rows="5"
                    placeholder="Entrez une valeur par ligne pour générer les codes à barres correspondants."
                    class="form-control"
                    ></textarea>
            </div>
            <div class="col-md-12 text-end" style="margin:10px;">
                <button class="btn btn-primary" type="submit">Générer les codes à barres</button>
            </div>
        </form>

        @if($errors->any())
            <div style="color:red; margin-top:10px;">
                {{ $errors->first() }}
            </div>
        @endif

        @if(isset($barcodes))
            <hr class="no-print" />

            <h2 class="no-print">Codes barres ({{ count($barcodes) }})</h2>

            <div class="grid row">
                @foreach($barcodes as $b)
                <div class="col-3 text-center" style="margin-bottom:20px;">
                    <img src="data:image/png;base64,{{ $b['img'] }}" width="100%" height="50px" max-height="50px" style="background: #fff; padding: 10px; padding-bottom: 0px; border-radius: 5px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; max-height: 50px !important;" />
                    <div class="value" style="background: #fff;color:#000; padding: 5px; padding-top:0px; border-radius: 5px; border-top-left-radius: 0px;border-top-right-radius: 0px;">{{ $b['value'] }}</div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection