@extends('layouts.app')

@section('content')
<style>
    .netflix-bg {
        background: linear-gradient(to bottom, #141414, #000000);
        min-height: 100vh;
    }
    
    .show-banner {
        position: relative;
        padding-top: 40px;
    }
    
    .show-poster {
        transition: transform 0.3s ease;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }
    
    .show-poster:hover {
        transform: scale(1.03);
    }
    
    .netflix-title {
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    .actor-card {
        transition: transform 0.2s ease;
        width: 120px;
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
    
    .actor-card p {
        font-size: 0.9rem;
        margin-top: 8px;
        line-height: 1.2;
    }
    
    .netflix-btn {
        padding: 12px 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .netflix-btn-secondary {
        background-color: rgba(109, 109, 110, 0.7);
        border: none;
        color: white;
    }
    
    .netflix-btn-secondary:hover {
        background-color: rgba(109, 109, 110, 0.9);
        transform: scale(1.05);
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

    .season-info {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 15px;
        margin-top: 20px;
    }

    .meta-info {
        color: #e50914;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .meta-info span {
        margin-right: 20px;
    }

    .meta-info i {
        margin-right: 5px;
    }
</style>

<div class="netflix-bg">
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-11 col-xl-10">
                <!-- TV Show Content -->
                <div class="row show-banner">
                    <!-- TV Show Poster -->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $tvShowData['poster_path'] ?? 'default_image.jpg' }}" 
                             class="img-fluid rounded show-poster w-100" 
                             alt="{{ $tvShowData['name'] ?? 'TV Show' }}">
                        
                        <div class="mt-4">
                            <a href="{{ route('movies.index') }}" 
                               class="btn netflix-btn netflix-btn-secondary w-100">
                                <i class="fas fa-arrow-left me-2"></i>Back to TV Shows
                            </a>
                        </div>
                    </div>

                    <!-- TV Show Details -->
                    <div class="col-lg-8">
                        <h1 class="netflix-title text-white display-4 mb-3">
                            {{ $tvShowData['name'] ?? 'TV Show Title' }}
                        </h1>

                        <!-- Meta Information -->
                        <div class="meta-info">
                            @if(isset($tvShowData['first_air_date']))
                                <span><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($tvShowData['first_air_date'])->format('Y') }}</span>
                            @endif
                            @if(isset($tvShowData['number_of_seasons']))
                                <span><i class="fas fa-film"></i> {{ $tvShowData['number_of_seasons'] }} Season(s)</span>
                            @endif
                            @if(isset($tvShowData['vote_average']))
                                <span><i class="fas fa-star"></i> {{ number_format($tvShowData['vote_average'], 1) }}/10</span>
                            @endif
                        </div>
                        
                        <p class="text-white-50 lead mb-4">
                            {{ $tvShowData['overview'] ?? 'No description available.' }}
                        </p>

                        <!-- Genres -->
                        <div class="mb-4">
                            <h5 class="text-white mb-3">Genres</h5>
                            <div class="d-flex flex-wrap">
                                @foreach ($tvShowData['genres'] as $genre)
                                    <span class="genre-badge">{{ $genre['name'] }}</span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Cast -->
                        <div class="mt-5">
                            <h5 class="text-white mb-3">Featured Cast</h5>
                            <div class="d-flex flex-wrap">
                                @php
                                    $actors = $cast ?? [];  
                                    $actors = array_slice($actors, 0, 6);
                                @endphp
                                
                                @if(count($actors) > 0)
                                    @foreach ($actors as $actor)
                                        <div class="actor-card me-4 mb-4 text-center">
                                            <img src="https://image.tmdb.org/t/p/w92{{ $actor['profile_path'] ?? 'default_profile.jpg' }}" 
                                                 class="rounded-circle mb-2" 
                                                 alt="{{ $actor['name'] ?? 'Actor' }}">
                                            <p class="text-white small">{{ $actor['name'] ?? 'Unknown Actor' }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-white">No cast information available.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Trailer -->
                        @if(isset($tvShowData['videos']['results'][0]))
                            <div class="trailer-container">
                                <h5 class="text-white mb-3">
                                    <i class="fas fa-play-circle me-2"></i>Official Trailer
                                </h5>
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/{{ $tvShowData['videos']['results'][0]['key'] }}" 
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @endif

                        <!-- Season Information -->
                        @if(isset($tvShowData['seasons']))
                            <div class="season-info mt-4">
                                <h5 class="text-white mb-3">
                                    <i class="fas fa-tv me-2"></i>Seasons
                                </h5>
                                <div class="row">
                                    @foreach($tvShowData['seasons'] as $season)
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 text-white">
                                                    <h6 class="mb-1">{{ $season['name'] }}</h6>
                                                    <small class="text-white-50">
                                                        {{ $season['episode_count'] }} Episodes 
                                                        @if(isset($season['air_date']))
                                                            • {{ \Carbon\Carbon::parse($season['air_date'])->format('Y') }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection