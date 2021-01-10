<?php

namespace App\Repositories;

use App\Models\DeliveryType;

class DeliveryTypeRepository extends BaseRepository
{
    public function __construct (DeliveryType $deliveryType)
    {
        $this->model = $deliveryType;
    }
}