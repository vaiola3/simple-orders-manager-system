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

    public function findAll ()
    {
        return $this->model
            ->join('clients','orders.client_id','=','clients.id')
            ->join('delivery_types','orders.delivery_type_id','=','delivery_types.id')
            ->select('orders.id', 'orders.dishes', 'clients.name as client', 'delivery_types.name as delivery_type', 'clients.info')
            ->get();
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
    {
        $this->model->create($fields);
    }
}