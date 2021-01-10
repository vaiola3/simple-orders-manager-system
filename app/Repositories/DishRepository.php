<?php

namespace App\Repositories;

use App\Models\Dish;

class DishRepository extends BaseRepository
{
    public function __construct (Dish $dish)
    {
        $this->model = $dish;
    }
}