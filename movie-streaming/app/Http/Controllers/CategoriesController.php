<?php
namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('categories.index', compact('categories'));
    }
}
