<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Seeder;

class TrucksTablseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trucks = [
            [
                'provider_id' => 2, 'brand_id' => 1, 'truck_type_id' => 1, 'model' => 'model 1',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '2607 - B R D',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10'
            ],
            [
                'provider_id' => 3, 'brand_id' => 1, 'truck_type_id' => 1, 'model' => 'model 2',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '7029 - S S D',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10'
            ],
            [
                'provider_id' => 2, 'brand_id' => 1, 'truck_type_id' => 2, 'model' => 'model 3',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '2872-SHA',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10'
            ],
            [
                'provider_id' => 4, 'brand_id' => 2, 'truck_type_id' => 3, 'model' => 'model 4',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '111',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10'
            ],
            [
                'provider_id' => 4, 'brand_id' => 3, 'truck_type_id' => 2, 'model' => 'model 5',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '333',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10', 't_kilometers' => '160'
            ],
            [
                'provider_id' => 5, 'brand_id' => 3, 'truck_type_id' => 2, 'model' => 'model 5',
                'l_number' => '11111', 'l_image' => 'demo.jpg', 'l_expiry_date' => '2020-12-15', 'p_number' => '222',
                'i_policy' => 'demo.jpg', 'm_per_kilometer' => '10', 't_kilometers' => '160'
            ],
        ];

        foreach ($trucks as $truck) {

            Truck::create($truck);

        }//end of for each

    }//end of run

}//end of seeder
