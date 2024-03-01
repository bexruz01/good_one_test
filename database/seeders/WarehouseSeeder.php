<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Warehouse::create([
            'material_name' => 'ткань-1',
            'remain' => 12,
            'price' => 1500
        ]);

        Warehouse::create([
            'material_name' => 'ткань-2',
            'remain' => 200,
            'price' => 1600
        ]);

        Warehouse::create([
            'material_name' => 'нить',
            'remain' => 40,
            'price' => 500
        ]);

        Warehouse::create([
            'material_name' => 'нить',
            'remain' => 300,
            'price' => 550
        ]);


        Warehouse::create([
            'material_name' => 'пуговица',
            'remain' => 500,
            'price' => 300
        ]);

        Warehouse::create([
            'material_name' => 'замок',
            'remain' => 1000,
            'price' => 2000
        ]);
        // Qolgan ma'lumotlar ham shu tarzda kiritiladi
    }
}
