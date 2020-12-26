<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DishTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DishType::factory(5)->create();
    }
}
