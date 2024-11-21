<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        <div class="list-group">
            @foreach ($categories as $category)
                <a href="{{ route('movies.index') }}" class="list-group-item list-group-item-action">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection

