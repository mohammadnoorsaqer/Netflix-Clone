<!-- resources/views/genres/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Genres</h1>
        <div class="list-group">
            @foreach ($genres as $genre)
                <a href="{{ route('movies.index') }}" class="list-group-item list-group-item-action">
                    {{ $genre->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
