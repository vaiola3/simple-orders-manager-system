<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Dish::factory(5)->create();
    }
}
