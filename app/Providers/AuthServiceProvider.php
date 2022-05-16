<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\ProviderRoute;
use App\Models\Trip;
use App\Models\Truck;
use App\Models\TruckPrice;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-trip', function (User $user, Trip $trip) {
            return $user->id === $trip->user_id;
        });

        Gate::define('provider-driver', function (User $user, User $driver) {
            return $user->id === $driver->provider_id;
        });

        Gate::define('provider-truck', function (User $user, Truck $truck) {
            return $user->id === $truck->provider_id;
        });

        Gate::define('provider-route', function (User $user, ProviderRoute $providerRoute) {
            return $user->id === $providerRoute->provider_id;
        });
        
        Gate::define('provider-truck-price', function (User $user, TruckPrice $truckPrice) {
            return $user->id === $truckPrice->provider_id;
        });

        Gate::define('provider-trip', function (User $user, Trip $trip) {
            return $user->id === $trip->provider_id;
        });

        Gate::define('provider-invoice', function (User $user, Invoice $invoice) {
            return $user->id === $invoice->provider_id;
        });
    }
}
