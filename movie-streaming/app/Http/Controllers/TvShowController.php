<?php
namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    protected $tmdb;

    // Inject the TmdbService
    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function show($id)
    {
        // Fetch TV show details including videos (trailers)
        $tvShowData = $this->tmdb->getTvShowDetails($id);
    
        // Check if credits (cast) data is available
        $cast = isset($tvShowData['credits']['cast']) ? $tvShowData['credits']['cast'] : [];
    
        // Check if video data (trailer) is available
        $videos = isset($tvShowData['videos']['results']) ? $tvShowData['videos']['results'] : [];
    
        // Pass the TV show, cast, and videos data to the view
        return view('tv-shows.show', compact('tvShowData', 'cast', 'videos'));
    }
    
    
    
    
}
