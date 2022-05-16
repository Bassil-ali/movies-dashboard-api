<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            ['name' => 'activity 1'],
            ['name' => 'activity 2'],
            ['name' => 'activity 3'],
            ['name' => 'activity 4'],
        ];

        foreach ($activities as $activity) {

            Activity::create($activity);

        }//end of for each

    }//end of run

}//end of seeder
