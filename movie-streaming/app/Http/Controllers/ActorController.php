<?php
namespace App\Http\Controllers;
use App\Models\actors;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = actors::all();
        return view('actors.index', compact('actors'));
    }
}
