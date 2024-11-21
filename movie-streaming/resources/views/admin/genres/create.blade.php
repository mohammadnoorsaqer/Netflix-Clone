@extends('layouts.admin')

@section('content')
    <h1>Add New Genre</h1>

    <form action="{{ route('admin.genres.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-success">Save Genre</button>
    </form>
@endsection
