<?php
// database/seeders/MoviesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\movies;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Predefined movie data
        $movies = [
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, forcing Batman to question everything he stands for.',
                'release_date' => '2008-07-18',
                'rating' => 9.0,
                'poster_image' => 'https://th.bing.com/th/id/R.34df6b287faf65b160b47e05ba85bb3b?rik=o5LsP1up4eGlXA&pid=ImgRaw&r=0',  // Replace with a real image URL
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.',
                'release_date' => '2010-07-16',
                'rating' => 8.8,
                'poster_image' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/b882a010219683.560e14dcc639a.jpg',  // Replace with a real image URL
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'release_date' => '1999-03-31',
                'rating' => 8.7,
                'poster_image' => 'https://picfiles.alphacoders.com/385/385304.jpg',  // Replace with a real image URL
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'release_date' => '1994-09-22',
                'rating' => 9.3,
                'poster_image' => 'https://th.bing.com/th/id/OIP.j9bxUofzBLpS1TLyH3RfogHaNr?rs=1&pid=ImgDetMain',  // Replace with a real image URL
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'In the sweaty backstreets of 1960s America, you don’t just walk into the world—you’ve gotta fight your way through it. The names are big, the deals are dirty, and everyone’s got their own version of the truth.',
                'release_date' => '1994-07-06',
                'rating' => 8.8,
                'poster_image' => 'https://picfiles.alphacoders.com/371/371109.jpg',  // Replace with a real image URL
            ],
            // Add more movie data as needed
        ];

        // Insert the movie data
        foreach ($movies as $movie) {
            movies::create([
                'title' => $movie['title'],
                'description' => $movie['description'],
                'release_date' => $movie['release_date'],
                'rating' => $movie['rating'],
                'poster_image' => $movie['poster_image'],
            ]);
        }
    }
}
