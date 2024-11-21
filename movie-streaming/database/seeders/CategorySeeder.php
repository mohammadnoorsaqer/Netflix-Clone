<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categories;
use App\Models\movies;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create some categories
        $categories = [
            'Action', 'Drama', 'Comedy', 'Horror', 'Sci-Fi', 'Romance', 'Thriller', 'Adventure'
        ];

        foreach ($categories as $category) {
            categories::create(['name' => $category]);
        }

        // Get a few movies
        $movies = movies::all();

        // Attach random categories to each movie
        $movies->each(function ($movie) {
            $movie->categories()->attach(
                categories::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
