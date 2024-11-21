@extends('layouts.admin')

@section('content')
    <h1>Movies</h1>
    <a href="{{ route('admin.movies.create') }}" class="btn btn-primary mb-3">Add New Movie</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie['title'] ?? 'N/A' }}</td> <!-- Display the movie title -->
                    <td>{{ \Carbon\Carbon::parse($movie['release_date'] ?? '')->format('M d, Y') }}</td> <!-- Format release date -->
                    <td>{{ $movie['vote_average'] ?? 'N/A' }}</td> <!-- Display the rating -->
                    <td>
                        <a href="{{ route('admin.movies.edit', $movie['id']) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie['id']) }}" method="POST" style="display:inline;">
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
