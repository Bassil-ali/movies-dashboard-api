<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;

class RoutesTablseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = [
            ['name' => 'route 1', 'from_point_id' => 1, 'to_point_id' => 2],
            ['name' => 'route 2', 'from_point_id' => 3, 'to_point_id' => 4],
            ['name' => 'route 3', 'from_point_id' => 3, 'to_point_id' => 1],
            ['name' => 'route 4', 'from_point_id' => 2, 'to_point_id' => 1],
            ['name' => 'route 5', 'from_point_id' => 4, 'to_point_id' => 2],
        ];

        foreach ($routes as $route) {

            Route::create($route);

        }//end of for each

    }//end of run

}//end of seeder
