<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function movies()
    {
        return $this->belongsToMany(movies::class, 'movie_genre')->withTimestamps();
    }
}
