@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <!-- Page Title -->
        <h1 class="text-center text-white mb-4">All Movies</h1>
        
        <!-- Movie Cards Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($movies as $movie)
                <div class="col">
                    <!-- Movie Card -->
                    <div class="card movie-card h-100">
                        <!-- Movie Poster Image -->
                        <img src="{{ asset('' . $movie->poster_image) }}" class="card-img-top movie-img" alt="{{ $movie->title }}">

                        <!-- Movie Information -->
                        <div class="card-body">
                            <h5 class="card-title text-black">{{ $movie->title }}</h5>
                            <p class="card-text text-black">{{ Str::limit($movie->description, 100) }}</p>
                        </div>

                        <!-- Footer with Actions -->
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <!-- View Details Button -->
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-dark btn-sm">View Details</a>

                            <!-- Add to Watchlist Form -->
                            <form action="{{ route('movies.addToWatchlist', $movie) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Add to Watchlist</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
