<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Client;

class ClientRepository extends BaseRepository
{
    public function __construct (Client $client)
    {
        $this->model = $client;
    }

    public function hasOrders ($id)
    {
        return Order::where('client_id', $id)->count() > 0;
    }

    public function getName ($id)
    {
        return $this->model->find($id)->name;
    }
}