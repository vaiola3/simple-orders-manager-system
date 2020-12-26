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
        \App\Models\DeliveryType::factory(5)->create();
    }
}
