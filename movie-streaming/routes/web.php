<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\TvShowController;

// Admin Controllers (with 'Admin' namespace)
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ActorController as AdminActorController;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('movies', AdminMovieController::class);
    Route::resource('genres', AdminGenreController::class);
    Route::resource('categories', AdminCategoryController::class);
});


// User Routes (for movies, genres, etc.)
Route::get('/', [MovieController::class, 'index'])->name('movies.index'); // Popular Movies on Home Page
Route::get('tvshows', [TvShowController::class, 'index'])->name('tvshows.index');

// Route for showing a single movie
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/trending-now', [MovieController::class, 'trendingNow'])->name('movies.trending');

// Route for TV Shows
Route::get('/tv-shows', [MovieController::class, 'tvShows'])->name('tvshows.index');
Route::get('tv-shows/{tvShow}', [TvShowController::class, 'show'])->name('tv-shows.show');

// Route to add movie to watchlist
Route::post('/movies/{movieId}/add-to-watchlist', [MovieController::class, 'addToWatchlist'])->name('movies.addToWatchlist');

// Route to remove movie from watchlist
Route::post('/movies/{movieId}/remove-from-watchlist', [MovieController::class, 'removeFromWatchlist'])->name('movies.removeFromWatchlist');

// Routes for genres
Route::get('genres', [GenreController::class, 'index'])->name('genres.index');

// Routes for categories
Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::middleware('auth')->get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::post('watchlist/{movie}/add', [WatchlistController::class, 'add'])->name('watchlist.add');
Route::post('watchlist/{movie}/remove', [WatchlistController::class, 'remove'])->name('watchlist.remove');

// Profile routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes (login, registration, etc.)
require __DIR__.'/auth.php';
