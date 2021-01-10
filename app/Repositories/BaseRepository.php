<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Client;

class BaseRepository
{
    protected $model;

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

    public function store ($fields)
    {
        $this->model->create($fields);
    }

    public function update ($fields, $id)
    {
        $client = $this->model->find($id);

        if (isset($client))
        {
            $client->fill($fields);

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