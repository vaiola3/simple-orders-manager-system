<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\DishRepository;
use App\Repositories\ClientRepository;
use App\Repositories\DeliveryTypeRepository;

class OrderRepository extends BaseRepository
{
    public function __construct (Order $client)
    {
        $this->model = $client;
    }

    public function getRelatedData (
        ClientRepository $clientRepo,
        DeliveryTypeRepository $deliveryTypeRepo,
        DishRepository $dishRepo
    ){
        return array (
            'client' => $clientRepo->findAll(),
            'dtypes' => $deliveryTypeRepo->findAll(),
            'dishes' => $dishRepo->findAll(),
        );
    }

    public function store ($fields)
    {dd($fields);
        $this->model->create($fields);
    }
}