<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Http\Requests\StoreClientRequest;
use App\Http\Controllers\API\BaseAPIController;

class ClientAPIController extends BaseAPIController
{
    public function __construct (ClientRepository $clientRepo)
    {
        $this->repository = $clientRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(StoreClientRequest $request)
    {
        return parent::store($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClient(StoreClientRequest $request, $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        $client = $this->repository->find($id);

        if (isset($client))
        {
            if ($this->repository->hasOrders($id))
            {
                $response_content['message'] = 'Cliente possui pedidos vinculados!';
                $response_status = 202;
            }
            else
            {
                try
                {
                    $this->repository->destroy($id);
    
                    $response_content['error'] = false;
                    $response_content['message'] = 'Cliente deletado com sucesso.';
    
                    $response_status = 200;
                } 
                catch (Exception $e)
                {
                    //
                }
            }
        }
        else
        {
            $response_content['message'] = 'Registro inexistente!';
            $response_status = 202;
        }


        return response()->json($response_content, $response_status);
    }
}
