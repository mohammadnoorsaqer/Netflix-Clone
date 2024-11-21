@extends('layouts.admin')

@section('content')
    <h1>Add New Movie</h1>

    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Movie Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="0" max="10" step="0.1" required>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-control" id="genre" name="genre">
                @foreach($genres as $genre)
                    <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Movie</button>
    </form>
@endsection
