@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Notifications</h2>

    @forelse(auth()->user()->notifications as $notification)
        <div class="card mb-2 {{ $notification->read_at ? '' : 'border-primary' }}">
            <div class="card-body d-flex justify-content-between">
                <div>
                    {{ $notification->data['message'] }}
                </div>
                <div>
                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>
    @empty
        <p>Aucune notification.</p>
    @endforelse
</div>
@endsection