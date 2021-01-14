<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Client;
use App\Models\Address;

class AddressRepository extends BaseRepository
{
    public function __construct (Address $address)
    {
        $this->model = $address;
    }

    public function getAddressesByClientID ($client_id)
    {
        return array (
            'client' => $client_id,
            'output' => $this->model->where('client_id', $client_id)->get()
        );
    }

    public function getClientByID ($client_id)
    {
        return Client::find($client_id);
    }
}