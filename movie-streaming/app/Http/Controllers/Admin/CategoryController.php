<?php
namespace App\Http\Controllers\Admin;

use App\Services\TmdbService;  // Import TmdbService
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;  // Inject the TmdbService
    }

    public function index()
    {
        // Get categories from TMDB API
        $categories = $this->tmdb->getCategories();  // Fetch categories from TMDB API
        
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Simulate storing a category (use request data if needed)
        return redirect()->route('admin.categories.index')->with('success', 'Category created (simulated) successfully!');
    }

    public function edit($categoryId)
    {
        // Get category details if necessary (optional as TMDB provides a list of categories)
        return view('admin.categories.edit');
    }

    public function update(Request $request, $categoryId)
    {
        // Simulate updating the category (use request data if needed)
        return redirect()->route('admin.categories.index')->with('success', 'Category updated (simulated) successfully!');
    }

    public function destroy($categoryId)
    {
        // Simulate deleting a category (no actual delete as we are fetching from TMDB)
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted (simulated) successfully!');
    }
}
