<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function movies()
    {
        return $this->belongsToMany(movies::class, 'category_movie', 'category_id', 'movie_id');
    }
}
