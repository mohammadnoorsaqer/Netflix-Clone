<?php
// database/seeders/WatchlistsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\movies;

class WatchlistsTableSeeder extends Seeder
{
    public function run()
    {
        // Get all users and movies
        $users = User::all();
        $movies = movies::all();

        // Attach random movies to random users' watchlists
        foreach ($users as $user) {
            $user->watchlist()->attach(
                $movies->random(5)->pluck('id')->toArray()
            );
        }
    }
}
