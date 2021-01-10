<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Client;

class ClientRepository
{
    private $model;

    public function __construct (Client $client)
    {
        $this->model = $client;
    }

    public function findAll ()
    {
        return $this->model->all();
    }

    public function inactivesFindAll ()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function find ($id)
    {
        return $this->model->find($id);
    }

    public function update ($fields, $id)
    {
        $client = $this->model->find($id);

        if (isset($client))
        {
            $client->name = $fields['name'];
            $client->contact = $fields['contact'];

            $client->save();
        }
    }

    public function destroy ($id)
    {
        $client = $this->model->find($id);

        if (isset($client))
        {
            $client->delete();
        }
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