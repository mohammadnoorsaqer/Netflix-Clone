<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MoviesTableSeeder::class,
            GenresTableSeeder::class,
            CategoriesTableSeeder::class,
            ActorsTableSeeder::class,
            WatchlistsTableSeeder::class,
        ]);
    }
}
