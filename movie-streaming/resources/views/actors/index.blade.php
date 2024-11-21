<!-- resources/views/actors/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Actors</h1>
        <div class="list-group">
            @foreach ($actors as $actor)
                <a href="{{ route('movies.index') }}" class="list-group-item list-group-item-action">
                    {{ $actor->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
