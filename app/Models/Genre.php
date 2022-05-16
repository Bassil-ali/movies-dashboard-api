<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['e_id', 'name'];

    //attr
    //scope

    //rel
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');

    }// end of movies

    //fun

}//end of model
