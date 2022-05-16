<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesTablseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationalities = [
            ['name' => 'nationality 1'],
            ['name' => 'nationality 2'],
            ['name' => 'nationality 3'],
            ['name' => 'nationality 4'],
        ];

        foreach ($nationalities as $nationality) {

            Nationality::create($nationality);

        }//end of for each

    }//end of run

}//end of seeder
