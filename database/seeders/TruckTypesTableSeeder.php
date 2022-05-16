<?php

namespace Database\Seeders;

use App\Models\TruckType;
use Illuminate\Database\Seeder;

class TruckTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truckTypes = [
            ['name' => 'truck type 1', 'image' => 'demo.jpg'],
            ['name' => 'truck type 2', 'image' => 'demo.jpg'],
            ['name' => 'truck type 3', 'image' => 'demo.jpg'],
            ['name' => 'truck type 4', 'image' => 'demo.jpg'],
        ];

        foreach ($truckTypes as $truckType) {

            TruckType::create($truckType);

        }//end of for each

    }//end of run

}//end of seeder
