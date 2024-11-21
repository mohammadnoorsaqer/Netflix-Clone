@extends('layouts.admin')

@section('content')
    <h1>Edit Genre</h1>

    <form action="{{ route('admin.genres.update', $genre['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $genre['name'] ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Genre</button>
    </form>
@endsection
