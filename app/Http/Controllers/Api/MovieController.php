<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\MovieResource;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::whenType(request()->type)
            ->whenSearch(request()->search)
            ->whenGenreId(request()->genre_id)
            ->whenActorId(request()->actor_id)
            ->with('genres')
            ->paginate(10);

        $data['movies'] = MovieResource::collection($movies)->response()->getData(true);

        return response()->api($data);

    }// end of index

    public function toggleFavorite()
    {
        auth()->user()->favoriteMovies()->toggle([request()->movie_id]);

        return response()->api(null, 0, 'movie toggled successfully');

    }// end of toggleFavourite

    public function images(Movie $movie)
    {
        return response()->api(ImageResource::collection($movie->images));

    }// end of images

    public function actors(Movie $movie)
    {
        return response()->api(ActorResource::collection($movie->actors));

    }// end of actors

    public function relatedMovies(Movie $movie)
    {
        $movies = Movie::whereHas('genres', function ($q) use ($movie) {
            return $q->whereIn('name', $movie->genres()->pluck('name'));
        })
            ->with('genres')
            ->where('id', '!=', $movie->id)
            ->paginate(10);

        return response()->api(MovieResource::collection($movies));

    }// end of relatedMovies

}//end of controller
