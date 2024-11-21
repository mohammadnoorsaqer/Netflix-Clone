@extends('layouts.app')

@section('content')
<style>
    .netflix-bg {
        background: linear-gradient(to bottom, #141414, #000000);
        min-height: 100vh;
    }
    
    .movie-banner {
        position: relative;
        padding-top: 40px;
    }
    
    .movie-poster {
        transition: transform 0.3s ease;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }
    
    .movie-poster:hover {
        transform: scale(1.03);
    }
    
    .netflix-title {
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    .actor-card {
        transition: transform 0.2s ease;
    }
    
    .actor-card:hover {
        transform: translateY(-5px);
    }
    
    .actor-card img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 2px solid #e50914;
    }
    
    .netflix-btn {
        padding: 12px 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .netflix-btn-primary {
        background-color: #e50914;
        border: none;
        color: white;
    }
    
    .netflix-btn-primary:hover {
        background-color: #ff0a16;
        transform: scale(1.05);
    }
    
    .netflix-btn-secondary {
        background-color: rgba(109, 109, 110, 0.7);
        border: none;
        color: white;
    }
    
    .netflix-btn-secondary:hover {
        background-color: rgba(109, 109, 110, 0.9);
    }
    
    .genre-badge {
        background-color: rgba(229, 9, 20, 0.1);
        color: #e50914;
        border: 1px solid #e50914;
        padding: 6px 12px;
        margin-right: 8px;
        margin-bottom: 8px;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    
    .trailer-container {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        padding: 20px;
        margin-top: 30px;
    }
</style>

<div class="netflix-bg">
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-11 col-xl-10">
                <!-- Movie Content -->
                <div class="row movie-banner">
                    <!-- Movie Poster -->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="{{ asset($movie->poster_image ?? 'https://image.tmdb.org/t/p/w500' . $movieData['poster_path']) }}" 
                             class="img-fluid rounded movie-poster w-100" 
                             alt="{{ $movie->title ?? $movieData['title'] }}">
                        
<!-- Watchlist Button Section -->
<div class="mt-4" id="watchlist-buttons">
    <!-- Remove from Watchlist Button -->
    <form action="{{ route('movies.removeFromWatchlist', ['movieId' => $movie->id ?? $movieData['id']]) }}" 
          method="POST" 
          class="watchlist-form" id="remove-watchlist-form" style="display: none;">
        @csrf
        @method('POST')
        <button type="submit" class="btn netflix-btn netflix-btn-secondary w-100">
            <i class="fas fa-check me-2"></i>Remove from Watchlist
        </button>
    </form>

    <!-- Add to Watchlist Button -->
    <form action="{{ route('movies.addToWatchlist', ['movieId' => $movie->id ?? $movieData['id']]) }}" 
          method="POST" 
          class="watchlist-form" id="add-watchlist-form">
        @csrf
        <button type="submit" class="btn netflix-btn netflix-btn-primary w-100">
            <i class="fas fa-plus me-2"></i>Add to Watchlist
        </button>
    </form>

    <!-- Back to Browse Button -->
    <div class="mt-3">
        <a href="{{ route('movies.index') }}" class="btn netflix-btn netflix-btn-secondary w-100">
            <i class="fas fa-arrow-left me-2"></i>Back to Browse
        </a>
    </div>
</div>



                    </div>

                    <!-- Movie Details -->
                    <div class="col-lg-8">
                        <h1 class="netflix-title text-white display-4 mb-4">
                            {{ $movie->title ?? $movieData['title'] }}
                        </h1>
                        
                        <p class="text-white-50 lead mb-4">
                            {{ $movie->description ?? $movieData['overview'] }}
                        </p>

                        <!-- Genres -->
                        <div class="mb-4">
                            <h5 class="text-white mb-3">Genres</h5>
                            <div class="d-flex flex-wrap">
                                @foreach ($movie->genres ?? $movieData['genres'] as $genre)
                                    <span class="genre-badge">{{ $genre->name ?? $genre['name'] }}</span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Cast -->
                        <div class="mt-5">
                            <h5 class="text-white mb-3">Featured Cast</h5>
                            <div class="d-flex flex-wrap">
                                @php
                                    $actors = $movie->actors ?? $movieData['credits']['cast'];
                                    $actors = array_slice($actors, 0, 6);
                                @endphp
                                
                                @foreach ($actors as $actor)
                                    <div class="actor-card me-4 mb-4 text-center">
                                        <img src="https://image.tmdb.org/t/p/w92{{ $actor->profile_path ?? $actor['profile_path'] }}" 
                                             class="rounded-circle mb-2" 
                                             alt="{{ $actor->name ?? $actor['name'] }}">
                                        <p class="text-white small mb-0">{{ $actor->name ?? $actor['name'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Trailer -->
                        @if(isset($movieData['videos']['results'][0]))
                            <div class="trailer-container">
                                <h5 class="text-white mb-3">
                                    <i class="fas fa-play-circle me-2"></i>Official Trailer
                                </h5>
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/{{ $movieData['videos']['results'][0]['key'] }}" 
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->

<script>
    $(document).ready(function () {
        // Handle Add to Watchlist click
        $('#add-watchlist-form').on('submit', function (e) {
            e.preventDefault();
            
            var form = $(this);
            
            // AJAX request to add to watchlist
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function (response) {
                    if (response.status === 'success') {
                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            background: '#141414',
                            color: '#ffffff'
                        });

                        // Hide Add button and show Remove button
                        $('#add-watchlist-form').hide();
                        $('#remove-watchlist-form').show();
                    }
                },
                error: function () {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.',
                        icon: 'error',
                        background: '#141414',
                        color: '#ffffff'
                    });
                }
            });
        });

        // Handle Remove from Watchlist click
        $('#remove-watchlist-form').on('submit', function (e) {
            e.preventDefault();
            
            var form = $(this);
            
            // AJAX request to remove from watchlist
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function (response) {
                    console.log(response); // Debugging line: Log the response to console

                    if (response.status === 'success') {
                        // Show success message
                        Swal.fire({
                            title: 'Removed!',
                            text: response.message,
                            icon: 'success',
                            background: '#141414',
                            color: '#ffffff'
                        });

                        // Hide Remove button and show Add button
                        $('#remove-watchlist-form').hide();
                        $('#add-watchlist-form').show();
                    }
                },
                error: function () {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.',
                        icon: 'error',
                        background: '#141414',
                        color: '#ffffff'
                    });
                }
            });
        });
    });
</script>



@endsection