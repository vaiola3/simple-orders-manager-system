<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_dish')->insert([
            'order_id' => 1,
            'dish_id' => 5
        ]);
        \DB::table('order_dish')->insert([
            'order_id' => 1,
            'dish_id' => 4
        ]);
        \DB::table('order_dish')->insert([
            'order_id' => 1,
            'dish_id' => 3
        ]);
        \DB::table('order_dish')->insert([
            'order_id' => 2,
            'dish_id' => 4
        ]);
        \DB::table('order_dish')->insert([
            'order_id' => 3,
            'dish_id' => 3
        ]);
        \DB::table('order_dish')->insert([
            'order_id' => 4,
            'dish_id' => 2
        ]);
    }
}
