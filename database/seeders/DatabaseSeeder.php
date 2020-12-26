<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            \Database\Seeders\AdminSeeder::class,
            \Database\Seeders\ClientSeeder::class,
            \Database\Seeders\DeliveryTypeSeeder::class,
            \Database\Seeders\OrderSeeder::class,
            \Database\Seeders\AddressSeeder::class,
            \Database\Seeders\DishTypeSeeder::class,
            \Database\Seeders\DishSeeder::class,
            \Database\Seeders\DeliverySeeder::class,
        ]);
    }
}
