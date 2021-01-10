<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\DeliveryType::factory(5)->create();
        \DB::table('delivery_types')->insert(['name' => 'Semanal']);
        \DB::table('delivery_types')->insert(['name' => 'Quinzenal']);
        \DB::table('delivery_types')->insert(['name' => 'Mensal']);
    }
}
