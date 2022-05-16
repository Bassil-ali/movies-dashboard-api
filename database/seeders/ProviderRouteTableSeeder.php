<?php

namespace Database\Seeders;

use App\Models\ProviderRoute;
use Illuminate\Database\Seeder;

class ProviderRouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providerRoutes = [
            ['provider_id' => 2, 'route_id' => 1, 'truck_id' => 1, 'price' => 10],
            ['provider_id' => 3, 'route_id' => 1, 'truck_id' => 2, 'price' => 20],
        ];

        foreach ($providerRoutes as $providerRoute) {

            ProviderRoute::create($providerRoute);

        }//end of for each

    }//end of run

}//end of seeder
