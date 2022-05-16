<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'city 1'],
            ['name' => 'city 2'],
            ['name' => 'city 3']
        ];

        foreach ($cities as $city) {

            City::create($city);

        }//end of for each


    }//end of run

}//end of seeder
