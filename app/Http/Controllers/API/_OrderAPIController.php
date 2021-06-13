<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Http\Requests\StoreOrderRequest;

class OrderAPIController extends Controller
{
    private $orderRepository;

    public function __construct (OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
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
            $payload = $this->orderRepository->findAll();

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
    public function store(StoreOrderRequest $request)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $this->orderRepository->store($request->all());

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateDefaultResponse()
    {
        return array (
            'error' => true,
            'message' => 'Ocorreu um erro',
        );
    }
}
