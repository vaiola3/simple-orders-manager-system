<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Http\Requests\StoreClientRequest;

class ClientAPIController extends Controller
{
    private $clientRepository;

    public function __construct (ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $payload = $this->clientRepository->findAll();

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $this->clientRepository->store($request->all());

            $response_content['error'] = false;
            $response_content['message'] = 'Success';

            $response_status = 201;
        }
        catch(Exception $e)
        {
            //
        };

        return response()->json($response_content, $response_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $payload = $this->clientRepository->find($id);

            if ($this->isNotNull($payload))
            {
                $response_content['error'] = false;
                $response_content['message'] = 'Success';
                $response_content['payload'] = $payload;

                $response_status = 200;
            }
            else
            {
                $response_status = 204;
            }
        }
        catch(Exception $e)
        {
            //
        };

        return response()->json($response_content, $response_status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, $id)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $user = $this->clientRepository->find($id);

            if ($this->isNotNull($user))
            {
                $new_values = $request->all();

                $payload = $this->clientRepository->update($new_values, $id);

                $response_content['error'] = false;
                $response_content['message'] = 'Success';
                $response_content['payload'] = $payload;

                $response_status = 200;
            }
            else
            {
                $response_status = 204;
            }
        }
        catch(Exception $e)
        {
            //
        };

        return response()->json($response_content, $response_status);
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

        $client = $this->clientRepository->find($id);

        if (isset($client))
        {
            if ($this->clientRepository->hasOrders($id))
            {
                $response_content['message'] = 'Cliente possui pedidos vinculados!';
                $response_status = 202;
            }
            else
            {
                try
                {
                    $this->clientRepository->destroy($id);
    
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

    private function generateDefaultResponse()
    {
        return array (
            'error' => true,
            'message' => 'Ocorreu um erro',
        );
    }

    private function isNotNull($value)
    {
        return !is_null($value);
    }
}
