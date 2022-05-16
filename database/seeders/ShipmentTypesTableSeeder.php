<?php

namespace Database\Seeders;

use App\Models\ShipmentType;
use Illuminate\Database\Seeder;

class ShipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipmentTypes = [
            ['name' => 'shipment type 1'],
            ['name' => 'shipment type 2'],
            ['name' => 'shipment type 3'],
            ['name' => 'shipment type 4'],
        ];

        foreach ($shipmentTypes as $shipmentType) {

            ShipmentType::create($shipmentType);

        }//end of for each

    }//end of run

}//end of seeder
