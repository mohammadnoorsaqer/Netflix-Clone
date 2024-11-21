<?php
// database/seeders/GenresTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\genres;

class GenresTableSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi', 'Romance', 'Thriller', 'Fantasy', 'Adventure', 'Documentary'
        ];

        foreach ($genres as $genre) {
            genres::create([
                'name' => $genre,
            ]);
        }
    }
}
