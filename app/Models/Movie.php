<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'movie_name',
        'movie_desc',
        'movie_quality',
        'movie_rating',
        'movie_image',
    ];
}
