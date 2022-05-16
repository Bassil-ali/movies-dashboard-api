<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'brand 1'],
            ['name' => 'brand 2'],
            ['name' => 'brand 3'],
            ['name' => 'brand 4'],
        ];

        foreach ($brands as $brand) {

            Brand::create($brand);

        }//end of for each

    }//end of run

}//end of seeder
