@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>Logs</h1>

    <form method="GET" class="mb-3">
        <label for="file" class="form-label">Fichier log :</label>
        <select name="file" id="file" class="form-select" onchange="this.form.submit()">
            @foreach($files as $file)
                <option value="{{ $file }}" @if($file == $selectedFile) selected @endif>{{ $file }}</option>
            @endforeach
        </select>
    </form>

    @if($selectedFile)
        <a href="{{ route('management.logs.download', $selectedFile) }}" class="btn btn-primary mb-3" style="padding: 0.5rem 1rem !important;">Télécharger le fichier</a>
    @endif

    @foreach($logs as $entry)
        @php
            $level = $entry['type'];
            $title = $entry['title'];
            $body = $entry['body'];
            $raw = $entry['raw'];
            
            $colorClass = match($level) {
                'ERROR' => 'border-danger',
                'WARNING' => 'border-warning',
                'INFO' => 'border-info',
                default => 'border-light'
            };
            $textColorClass = match($level) {
                'ERROR' => 'text-danger',
                'WARNING' => 'text-warning',
                'INFO' => 'text-info',
                default => 'text-muted'
            };

            preg_match('/^\[(.*?)\]/', $raw, $matches);
            $datetime = $matches[1] ?? '';
        @endphp

        <div class="card mb-3 {{ $colorClass }}">
            <div class="card-header  {{ $colorClass }}"><h5 class="{{ $textColorClass }}"><strong>{{ strtoupper($level) }}:</strong> {{ $title }}</h5></div>
            <div class="card-body p-2" style="max-height:300px; overflow:auto; white-space:pre-wrap;">
                @foreach($body as $line)
                    {{ $line }}<br>
                @endforeach
            </div>
            <div class="card-footer {{ $colorClass }} text-muted" style="font-size: 0.8rem;">
                <div class="row">
                    <div class="text-start col-6">Type: {{ ucfirst(strtolower($level)) }}</div>
                    <div class="text-end col-6">{{ $datetime }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection