<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointsTablseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $points = [
            ['name' => 'point 1', 'description' => 'description 1'],
            ['name' => 'point 2', 'description' => 'description 2'],
            ['name' => 'point 3', 'description' => 'description 3'],
            ['name' => 'point 4', 'description' => 'description 4'],
        ];

        foreach ($points as $point) {

            Point::create($point);

        }//end of for each

    }//end of run

}//end of seeder
