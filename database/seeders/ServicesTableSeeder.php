<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['title' => 'title 1', 'description' => 'description 1'],
            ['title' => 'title 2', 'description' => 'description 2'],
            ['title' => 'title 3', 'description' => 'description 3'],
        ];

        foreach ($services as $service) {

            Service::create($service);

        }//end of for each
        
    }//end of run

}//end of seeder
