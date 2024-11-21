<?php
namespace App\Http\Controllers\Admin;

use App\Services\TmdbService;  // Import TmdbService
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;  // Inject the TmdbService
    }

    public function index()
    {
        // Get popular movies from TMDB API
        $movies = $this->tmdb->getPopularMovies()['results'] ?? [];  // Fetch the movie data
        
        return view('admin.movies.index', compact('movies'));  // Pass it to the view
    }

    public function create()
    {
        // Get genres, categories, and actors from TMDB API
        $genres = $this->tmdb->getGenres();  // Fetch genres
        $categories = $this->tmdb->getCategories();  // Fetch categories
        // Note: You may not need actors here directly since we're showing movie data.
        
        return view('admin.movies.create', compact('genres', 'categories'));
    }

    public function store(Request $request)
    {
        // Simulate storing a movie, typically you'd use request data here, but this is read-only from the API
        return redirect()->route('admin.movies.index')->with('success', 'Movie created (simulated) successfully!');
    }

    public function edit($movieId)
    {
        // Fetch the movie details from the TMDB API
        $movieDetails = $this->tmdb->getMovieDetails($movieId);
        $genres = $this->tmdb->getGenres();
        $categories = $this->tmdb->getCategories();

        return view('admin.movies.edit', compact('movieDetails', 'genres', 'categories'));
    }

    public function update(Request $request, $movieId)
    {
        // Simulate the update of movie data, as API only allows viewing
        return redirect()->route('admin.movies.index')->with('success', 'Movie updated (simulated) successfully!');
    }

    public function destroy($movieId)
    {
        // Simulate deleting a movie
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted (simulated) successfully!');
    }
}
