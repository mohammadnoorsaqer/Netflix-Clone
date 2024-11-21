@extends('layouts.admin')

@section('content')
    <h1>Genres</h1>
    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary mb-3">Add New Genre</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre['name'] ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.genres.edit', $genre['id']) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.genres.destroy', $genre['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
