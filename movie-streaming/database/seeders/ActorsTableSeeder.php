<?php
// database/seeders/ActorsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\actors;
use Faker\Factory as Faker;

class ActorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Predefined actor data for a more realistic touch
        $actors = [
            [
                'name' => 'Leonardo DiCaprio',
                'biography' => 'Leonardo Wilhelm DiCaprio is an American actor, producer, and environmental activist. He has received numerous accolades, including an Academy Award for Best Actor for his role in "The Revenant".',
                'date_of_birth' => '1974-11-11',
                'profile_image' => 'https://example.com/images/leonardo.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Meryl Streep',
                'biography' => 'Mary Louise "Meryl" Streep is an American actress, widely regarded as one of the greatest actresses of all time. She has won numerous awards including three Academy Awards.',
                'date_of_birth' => '1949-06-22',
                'profile_image' => 'https://example.com/images/meryl-streep.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Morgan Freeman',
                'biography' => 'Morgan Freeman is an American actor, director, and narrator. He is known for his distinctive voice and has appeared in numerous popular films including "Shawshank Redemption" and "Driving Miss Daisy".',
                'date_of_birth' => '1937-06-01',
                'profile_image' => 'https://example.com/images/morgan-freeman.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Scarlett Johansson',
                'biography' => 'Scarlett Ingrid Johansson is an American actress and singer, one of the highest-grossing actresses of all time. She is known for her roles in the Marvel Cinematic Universe as Natasha Romanoff / Black Widow.',
                'date_of_birth' => '1984-11-22',
                'profile_image' => 'https://example.com/images/scarlett-johansson.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Tom Hanks',
                'biography' => 'Thomas Jeffrey Hanks is an American actor and filmmaker. He is known for his roles in films such as "Forrest Gump", "Cast Away", and "Saving Private Ryan". He has won two Academy Awards for Best Actor.',
                'date_of_birth' => '1956-07-09',
                'profile_image' => 'https://example.com/images/tom-hanks.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Brad Pitt',
                'biography' => 'William Bradley Pitt is an American actor and film producer. He is known for his roles in "Fight Club", "Se7en", "Once Upon a Time in Hollywood", and for producing films through his production company Plan B Entertainment.',
                'date_of_birth' => '1963-12-18',
                'profile_image' => 'https://example.com/images/brad-pitt.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Emma Stone',
                'biography' => 'Emily Jean Stone is an American actress. She is known for her roles in "La La Land", "Birdman", and "The Help". She won the Academy Award for Best Actress for her role in "La La Land".',
                'date_of_birth' => '1988-11-06',
                'profile_image' => 'https://example.com/images/emma-stone.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Chris Hemsworth',
                'biography' => 'Chris Hemsworth is an Australian actor best known for his role as Thor in the Marvel Cinematic Universe. He has also starred in films such as "Rush" and "Extraction".',
                'date_of_birth' => '1983-08-11',
                'profile_image' => 'https://example.com/images/chris-hemsworth.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Natalie Portman',
                'biography' => 'Natalie Portman is an Israeli-American actress, director, and producer. She has won numerous awards including an Academy Award for her role in "Black Swan".',
                'date_of_birth' => '1981-06-09',
                'profile_image' => 'https://example.com/images/natalie-portman.jpg', // Replace with real image URL
            ],
            [
                'name' => 'Will Smith',
                'biography' => 'Willard Carroll "Will" Smith Jr. is an American actor, producer, and rapper. He is known for his roles in "The Fresh Prince of Bel-Air", "Men in Black", and "Ali".',
                'date_of_birth' => '1968-09-25',
                'profile_image' => 'https://example.com/images/will-smith.jpg', // Replace with real image URL
            ],
            // Add more actors as needed
        ];

        // Insert the actor data
        foreach ($actors as $actor) {
            actors::create([
                'name' => $actor['name'],
                'biography' => $actor['biography'],
                'date_of_birth' => $actor['date_of_birth'],
                'profile_image' => $actor['profile_image'],
            ]);
        }
    }
}
