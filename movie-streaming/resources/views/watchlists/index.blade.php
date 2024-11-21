@extends('layouts.app')

@section('content')
    <!-- Include the navigation bar -->
    @include('layouts.navigation')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">Your Watchlist</h2>
            <span class="text-muted">{{ count($movies) }} movies</span>
        </div>

        <div class="row g-4">
            @forelse ($movies as $movie)
                <div class="col-md-6 col-lg-4">
                    <div class="movie-card">
                        <div class="poster-wrapper">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" 
                                 alt="{{ $movie['title'] }}" 
                                 class="movie-img">
                            <div class="overlay">
                                <a href="{{ route('movies.show', $movie['id']) }}" 
                                   class="btn btn-danger rounded-pill">View Details</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $movie['title'] }}</h5>
                            <p class="card-text">{{ Str::limit($movie['overview'], 100) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center empty-state">
                    <i class="fas fa-film mb-3"></i>
                    <p class="text-white">No movies in your watchlist.</p>
                    <a href="{{ route('movies.index') }}" class="btn btn-danger rounded-pill">Browse Movies</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Base Styles */
        body {
            background-color: #141414;
        }

        .container {
            max-width: 1400px;
        }

        /* Movie Card Styling */
        .movie-card {
            background-color: #1a1a1a;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        /* Poster Wrapper and Overlay */
        .poster-wrapper {
            position: relative;
            overflow: hidden;
        }

        .movie-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .movie-card:hover .movie-img {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 100%;
        }

        .movie-card:hover .overlay {
            opacity: 1;
        }

        /* Card Content */
        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .card-text {
            font-size: 0.95rem;
            color: #a8a8a8;
            line-height: 1.6;
        }

        /* Button Styling */
        .btn-danger {
            background-color: #e50914;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-danger:hover {
            background-color: #f40612;
            transform: scale(1.05);
        }

        /* Empty State */
        .empty-state {
            padding: 4rem 2rem;
            background-color: #1a1a1a;
            border-radius: 12px;
        }

        .empty-state i {
            font-size: 3rem;
            color: #a8a8a8;
            display: block;
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        /* Responsive Adjustments */
        @media screen and (max-width: 768px) {
            .movie-img {
                height: 300px;
            }

            .card-body {
                padding: 1rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush