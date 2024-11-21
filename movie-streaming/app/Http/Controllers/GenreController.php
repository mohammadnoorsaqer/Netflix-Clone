<?php
namespace App\Http\Controllers;

use App\Models\genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = genres::all();
        return view('genres.index', compact('genres'));
    }
}
