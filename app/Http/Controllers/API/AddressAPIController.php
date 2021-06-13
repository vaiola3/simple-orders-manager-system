<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AddressRepository;
use App\Http\Requests\StoreClientAddressesRequest;

class AddressAPIController extends BaseAPIController
{
    public function __construct (AddressRepository $address_repository)
    {
        $this->repository = $address_repository;
    }

    public function list($client_id)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $payload = $this->repository->getAddressesByClientID($client_id);

            $response_content['error'] = false;
            $response_content['message'] = 'Success';
            $response_content['payload'] = $payload;

            $response_status = 200;
        }
        catch(Exception $e)
        {
            //
        };

        return response()->json($response_content, $response_status);
    }

    public function storeAddress(StoreClientAddressesRequest $request)
    {
        parent::store($request);
    }

    public function updateAddress(StoreClientAddressesRequest $request, $id)
    {
        parent::update($request, $id);
    }
}
