@extends('layouts.app')
@section('title', trans('tools.generate_barcode'))
@section('slogan', trans('tools.generate_barcode_description'))
@section('content')

<h1>Barcode Generator (Excel Paste)</h1>

<form method="POST" action="/{{app()->getLocale()}}/tools/generate-barcode">
    @csrf

    <textarea
        name="list"
        rows="10"
        placeholder="Paste Excel column here (Ctrl+C from Excel → Ctrl+V)"
    >{{ old('list') }}</textarea>

    <div class="hint">
        ✔ Support Excel column paste<br>
        ✔ One value per line<br>
        ✔ Tabs and spaces supported
    </div>

    <button type="submit">Generate Barcodes</button>
</form>

@if($errors->any())
    <div style="color:red; margin-top:10px;">
        {{ $errors->first() }}
    </div>
@endif

@if(isset($barcodes))
    <hr>

    <h2>Generated ({{ count($barcodes) }})</h2>

    <div class="grid">
        @foreach($barcodes as $b)
            <div class="card">
                <div class="value">{{ $b['value'] }}</div>

                <img src="data:image/png;base64,{{ $b['img'] }}">

            </div>
        @endforeach
    </div>
@endif

@endsection