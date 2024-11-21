<?php
// database/seeders/CategoriesTableSeeder.php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Top Rated', 'Trending', 'New Releases', 'Family Friendly', 'Action Movies', 'Romantic Movies'
        ];

        foreach ($categories as $category) {
            categories::create([
                'name' => $category,
            ]);
        }
    }
}

