@extends('layouts.admin')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('admin.categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category['name'] ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
