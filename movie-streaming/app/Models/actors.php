<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actors extends Model
{
    use HasFactory;

    // Add the fillable property to allow mass assignment for 'name'
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(movies::class, 'movie_actor')->withTimestamps();
    }
}
