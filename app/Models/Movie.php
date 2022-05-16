<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'e_id', 'title', 'description', 'poster', 'banner', 'release_date', 'vote',
        'vote_count', 'type'
    ];

    protected $appends = ['poster_path', 'banner_path'];

    // protected $casts = [
    //     'release_date' => 'date',
    // ];

    //attr
    public function getPosterPathAttribute()
    {
        return 'https://image.tmdb.org/t/p/w500' . $this->poster;

    }// end of getPosterPathAttribute

    public function getBannerPathAttribute()
    {
        return 'https://image.tmdb.org/t/p/w500' . $this->banner;

    }// end of getBannerPathAttribute

    //scope
    public function scopeWhenGenreId($query, $genreId)
    {
        return $query->when($genreId, function ($q) use ($genreId) {

            return $q->whereHas('genres', function ($qu) use ($genreId) {

                return $qu->where('genres.id', $genreId);

            });

        });

    }// end of scopeWhenGenreId

    public function scopeWhenActorId($query, $actorId)
    {
        return $query->when($actorId, function ($q) use ($actorId) {

            return $q->whereHas('actors', function ($qu) use ($actorId) {

                return $qu->where('actors.id', $actorId);

            });

        });

    }// end of scopeWhenActorId

    public function scopeWhenType($query, $type)
    {
        return $query->when($type, function ($q) use ($type) {

            if ($type == 'popular') {
                return $q->where('type', null);
            }

            return $q->where('type', $type);

        });

    }// end of scopeWhenType

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title', 'like', '%' . $search . '%');

        });

    }// end of scopeWhenSearch

    //rel
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');

    }// end of genres

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor');

    }// end of actors

    public function images()
    {
        return $this->hasMany(Image::class);

    }// end of images

    public function favoriteByUsers()
    {
        return $this->belongsToMany(User::class, 'user_favorite_movie', 'movie_id', 'user_id');

    }// end of favouriteByUsers

    //fun

}//end of model
