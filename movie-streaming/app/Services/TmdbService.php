<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TmdbService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    /**
     * Fetch popular movies from TMDB API.
     */
    public function getPopularMovies()
    {
        try {
            $response = Http::withOptions([
                'verify' => false,  // Disable SSL certificate verification (only if needed)
            ])->get('https://api.themoviedb.org/3/movie/popular', [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
                'page' => 1,
            ]);

            if ($response->successful()) {
                return $response->json();  // Return the JSON response
            }

            // Log the error if the request fails
            Log::error('TMDB API Error: Failed to fetch popular movies.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];

        } catch (\Exception $e) {
            // Log the exception message
            Log::error('TMDB API Error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Fetch movie details from TMDB API, including genres, description, and trailer.
     */
    public function getMovieDetails($movieId)
    {
        try {
            // Fetch movie details
            $response = Http::withOptions([
                'verify' => false,  // Disable SSL certificate verification (only if needed)
            ])->get("https://api.themoviedb.org/3/movie/{$movieId}", [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            if ($response->successful()) {
                $movieData = $response->json();

                // Fetch cast data
                $creditsResponse = Http::withOptions([
                    'verify' => false,
                ])->get("https://api.themoviedb.org/3/movie/{$movieId}/credits", [
                    'api_key' => $this->apiKey,
                ]);

                if ($creditsResponse->successful()) {
                    $movieData['credits'] = $creditsResponse->json();
                } else {
                    Log::error('TMDB API Error: Failed to fetch movie credits.', [
                        'status' => $creditsResponse->status(),
                        'response' => $creditsResponse->body(),
                    ]);
                    $movieData['credits'] = null;
                }

                // Fetch movie video (trailer)
                $videosResponse = Http::withOptions([
                    'verify' => false,  // Disable SSL certificate verification (only if needed)
                ])->get("https://api.themoviedb.org/3/movie/{$movieId}/videos", [
                    'api_key' => $this->apiKey,
                    'language' => 'en-US',
                ]);

                if ($videosResponse->successful()) {
                    $movieData['videos'] = $videosResponse->json();  // Store video data
                } else {
                    Log::error('TMDB API Error: Failed to fetch movie videos.', [
                        'status' => $videosResponse->status(),
                        'response' => $videosResponse->body(),
                    ]);
                    $movieData['videos'] = null;
                }

                return $movieData;  // Return the combined movie data (including cast and videos)
            }

            // Log error if movie details request fails
            Log::error('TMDB API Error: Failed to fetch movie details.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];

        } catch (\Exception $e) {
            // Log the exception
            Log::error('TMDB API Error: ' . $e->getMessage());
            return [];
        }
    }
    public function getTrendingMovies()
    {
        try {
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification (if necessary)
            ])->get('https://api.themoviedb.org/3/trending/movie/week', [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();
                Log::info('TMDB Trending Movies Response:', $data); // Log the data for debugging

                // Check if the 'results' key contains any movies
                if (empty($data['results'])) {
                    Log::warning('No trending movies available.');
                    return [];
                }

                return $data['results']; // Return the 'results' array (list of movies)
            }

            // Log API error response
            Log::error('TMDB API Error: Failed to fetch trending movies.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];

        } catch (\Exception $e) {
            Log::error('TMDB API Error: ' . $e->getMessage());
            return [];
        }
    }
    public function getPopularTvShows()
{
    try {
        $response = Http::withOptions([
            'verify' => false,  // Disable SSL certificate verification (only if needed)
        ])->get('https://api.themoviedb.org/3/tv/popular', [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'page' => 1,
        ]);

        if ($response->successful()) {
            return $response->json();  // Return the JSON response
        }

        // Log the error if the request fails
        Log::error('TMDB API Error: Failed to fetch popular TV shows.', [
            'status' => $response->status(),
            'response' => $response->body(),
        ]);
        return [];

    } catch (\Exception $e) {
        // Log the exception message
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getNetflixOriginalsTvShows()
{
    try {
        $response = Http::withOptions([
            'verify' => false,  // Disable SSL certificate verification (only if needed)
        ])->get('https://api.themoviedb.org/3/discover/tv', [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'with_networks' => 213,  // Network ID for Netflix
        ]);

        if ($response->successful()) {
            return $response->json()['results'];  // Return only the 'results' array
        }

        Log::error('TMDB API Error: Failed to fetch Netflix Originals TV shows.', [
            'status' => $response->status(),
            'response' => $response->body(),
        ]);
        return [];  // Return an empty array if the request fails

    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getNetflixOriginalsMovies()
{
    try {
        $response = Http::withOptions([
            'verify' => false,  // Disable SSL certificate verification (only if needed)
        ])->get('https://api.themoviedb.org/3/discover/movie', [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'with_production_companies' => 137,  // Production company ID for Netflix
        ]);

        if ($response->successful()) {
            return $response->json()['results'];  // Return only the 'results' array
        }

        Log::error('TMDB API Error: Failed to fetch Netflix Originals Movies.', [
            'status' => $response->status(),
            'response' => $response->body(),
        ]);
        return [];  // Return an empty array if the request fails

    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getTvShowDetails($id)
{
    // Make sure to append 'videos' to the response
    $url = "https://api.themoviedb.org/3/tv/{$id}?api_key={$this->apiKey}&append_to_response=credits,videos";

    $response = file_get_contents($url);  // Use Guzzle or other methods in production

    return json_decode($response, true);  // Return the response as an array
}

public function getActorDetails($actorId)
{
    try {
        $response = Http::withOptions(['verify' => false])
            ->get("https://api.themoviedb.org/3/person/{$actorId}", [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error('TMDB API Error: Failed to fetch actor details.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];
        }
    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getCategories()
{
    try {
        $response = Http::withOptions(['verify' => false])
            ->get('https://api.themoviedb.org/3/genre/movie/list', [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

        if ($response->successful()) {
            return $response->json()['genres'];
        } else {
            Log::error('TMDB API Error: Failed to fetch movie categories.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];
        }
    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getGenres()
{
    try {
        $response = Http::withOptions(['verify' => false])
            ->get('https://api.themoviedb.org/3/genre/movie/list', [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

        if ($response->successful()) {
            return $response->json()['genres'];
        } else {
            Log::error('TMDB API Error: Failed to fetch genres.', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return [];
        }
    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}
public function getTrendingActors()
{
    try {
        $response = Http::withOptions([
            'verify' => false, // Disable SSL certificate verification (if needed)
        ])->get('https://api.themoviedb.org/3/trending/person/week', [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ]);

        if ($response->successful()) {
            return $response->json()['results']; // Return a list of trending actors
        }

        // Log API error response
        Log::error('TMDB API Error: Failed to fetch trending actors.', [
            'status' => $response->status(),
            'response' => $response->body(),
        ]);
        return [];

    } catch (\Exception $e) {
        Log::error('TMDB API Error: ' . $e->getMessage());
        return [];
    }
}



}
