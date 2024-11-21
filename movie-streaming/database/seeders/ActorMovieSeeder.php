<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\movies;
use App\Models\actors;
use Illuminate\Support\Arr;

class ActorMovieSeeder extends Seeder
{
    public function run()
    {
        // Get all movies and actors
        $movies = movies::all();
        $actors = actors::all();

        // Iterate over all movies
        foreach ($movies as $movie) {
            // Randomly assign 1 to 3 actors for each movie (you can adjust the range)
            $assignedActors = Arr::random($actors->pluck('id')->toArray(), rand(1, 3));

            // Attach the actors to the movie
            $movie->actors()->attach($assignedActors);
        }
    }
}
