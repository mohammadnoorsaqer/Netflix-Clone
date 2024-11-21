<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\movies;
use App\Models\genres;
use Illuminate\Support\Arr;

class GenreMovieSeeder extends Seeder
{
    public function run()
    {
        // Get all movies and genres
        $movies = movies::all();
        $genres = genres::all();

        // Iterate over all movies
        foreach ($movies as $movie) {
            // Randomly assign 1 to 3 genres for each movie (you can adjust the range)
            $assignedGenres = Arr::random($genres->pluck('id')->toArray(), rand(1, 3));

            // Attach the genres to the movie
            $movie->genres()->attach($assignedGenres);
        }
    }
}