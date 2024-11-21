<?php
namespace App\Http\Controllers\Admin;

use App\Services\TmdbService;  // Import TmdbService
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;  // Inject the TmdbService
    }

    public function index()
    {
        // Get genres from TMDB API
        $genres = $this->tmdb->getGenres();  // Fetch genres from TMDB API
        
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        // Simulate storing a genre (you can use request data if necessary)
        return redirect()->route('admin.genres.index')->with('success', 'Genre created (simulated) successfully!');
    }

    public function edit($genreId)
    {
        // Get genre details if necessary (optional as TMDB only provides a list of genres)
        return view('admin.genres.edit');
    }

    public function update(Request $request, $genreId)
    {
        // Simulate updating the genre (you can use request data if necessary)
        return redirect()->route('admin.genres.index')->with('success', 'Genre updated (simulated) successfully!');
    }

    public function destroy($genreId)
    {
        // Simulate deleting a genre (no actual delete as we are fetching from TMDB)
        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted (simulated) successfully!');
    }
}
