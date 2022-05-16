<?php

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

//genre routes
Route::get('/genres', 'GenreController@index');

//movie routes
Route::get('/movies/{movie}/images', 'MovieController@images');
Route::get('/movies/{movie}/actors', 'MovieController@actors');
Route::get('/movies/{movie}/related_movies', 'MovieController@relatedMovies');
Route::get('/movies', 'MovieController@index');

Route::middleware('auth:sanctum')->group(function () {

    //movie routes
    Route::get('/movies/toggle_movie', 'MovieController@toggleFavorite');

    //user route
    Route::get('/user', 'AuthController@user');
});