<?php

use App\Models\Trip;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('trips.{trip}', function ($user, Trip $trip) {

    return $user->hasRole('super_admin') || $trip->provider_id == $user->id || $trip->user_id == $user->id;
});