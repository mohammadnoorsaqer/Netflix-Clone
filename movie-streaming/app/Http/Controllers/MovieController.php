<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Services\TmdbService; // Import the service
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class MovieController extends Controller
{
    protected $tmdb;

    // Inject the TmdbService
    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function index()
    {
        // Fetch popular movies from TMDB
        $tmdbMovies = $this->tmdb->getPopularMovies();
        $movies = isset($tmdbMovies['results']) ? $tmdbMovies['results'] : [];
        $trendingMovies = $this->tmdb->getTrendingMovies();
        $trendingMovies = isset($trendingMovies) ? $trendingMovies : []; 
        // Fetch popular TV shows from TMDB
        $tmdbTvShows = $this->tmdb->getPopularTvShows();
        $tvShows = isset($tmdbTvShows['results']) ? $tmdbTvShows['results'] : [];
        $netflixOriginalsMovies = $this->tmdb->getNetflixOriginalsMovies();
        $netflixOriginalsMovies = isset($netflixOriginalsMovies) ? $netflixOriginalsMovies : [];
    
        $netflixOriginalsTvShows = $this->tmdb->getNetflixOriginalsTvShows();
        $netflixOriginalsTvShows = isset($netflixOriginalsTvShows) ? $netflixOriginalsTvShows : [];
        // Pass both movies and TV shows to the view
        return view('index', compact('movies', 'tvShows','trendingMovies','netflixOriginalsMovies', 'netflixOriginalsTvShows'));
    }
    
    public function trendingNow()
    {
        // Fetch trending movies from TMDB
        $trendingMovies = $this->tmdb->getTrendingMovies();

        // If no movies are found, show a message in the view
        if (empty($trendingMovies)) {
            Log::warning('No trending movies available.');
            return view('index', ['message' => 'No trending movies available at the moment.']);
        }

        // Pass trending movies to the view
        return view('index', compact('trendingMovies'));
    }
// MovieController.php

public function tvShows()
{
    // Fetch the popular TV shows from TMDB
    $tvShowsData = $this->tmdb->getPopularTvShows();

    // Check if the API response contains the 'results' key
    $tvShows = isset($tvShowsData['results']) ? $tvShowsData['results'] : [];

    return view('index', compact('tvShows'));  // Pass the tvShows variable to the view
}


    
    public function show($id)
    {
        $movie = Movies::with('genres', 'categories', 'actors')->find($id);

        if (!$movie) {

            $movieData = $this->tmdb->getMovieDetails($id); 

            if ($movieData) {
                return view('movies.show', compact('movieData'));
            } else {
                abort(404, 'Movie not found');
            }
        }
        return view('movies.show', compact('movie'));
    }

    public function addToWatchlist(Request $request, $movieId)
    {
        $user = $request->user();
    
        // Attach the movie to the user's watchlist
        $user->watchlist()->attach(['tmdb_movie_id' => $movieId]);
    
        // Return a response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'Movie added to your watchlist!',
            'action' => 'added',  // Indicates the action was "added"
        ]);
    }
    public function removeFromWatchlist(Request $request, $movieId)
    {
        $user = $request->user(); 
        $user->watchlist()->detach(['tmdb_movie_id' => $movieId]); 
    
        return response()->json([
            'status' => 'success',
            'message' => 'Movie removed from your watchlist!'
        ]);
    }
}

