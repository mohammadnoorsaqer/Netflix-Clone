<?php


namespace App\Models;

use App\Models\genres;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title', 'description', 'release_date', 'poster_image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'watchlist', 'tmdb_movie_id', 'user_id');
    }
    

    public function genres()
    {
        return $this->belongsToMany(genres::class, 'genre_movie', 'movie_id', 'genre_id')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(categories::class, 'category_movie', 'movie_id', 'category_id')->withTimestamps();
    }

    public function actors()
    {
        return $this->belongsToMany(actors::class, 'actor_movie', 'movie_id', 'actor_id')->withTimestamps();
    }
    
}
