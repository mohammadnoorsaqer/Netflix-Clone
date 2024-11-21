<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;  // Import the TMDB Service
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchlistController extends Controller
{
    protected $tmdb;

    // Inject the TmdbService
    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    // Display user's watchlist
    public function index(Request $request)
    {
        $user = $request->user();  // Get the currently authenticated user
    
        // Fetch tmdb_movie_id values from the watchlist table for the user
        $watchlistMovieIds = DB::table('watchlist')
            ->where('user_id', $user->id)
            ->pluck('tmdb_movie_id'); // Get only the movie ids
    
        if ($watchlistMovieIds->isEmpty()) {
            // If no movies in the watchlist, pass an empty collection
            $movies = collect();
        } else {
            // If there are movies, fetch details from the TMDB API
            $movies = [];
            foreach ($watchlistMovieIds as $movieId) {
                // Fetch the movie details from TMDB API
                $movieData = $this->tmdb->getMovieDetails($movieId);
                if ($movieData) {
                    $movies[] = $movieData;  // Add movie details to the array
                }
            }
            $movies = collect($movies);  // Convert array to a collection
        }
    
        // Return the view with the movies, using the correct path
        return view('watchlists.index', compact('movies'));
    }
    
}
