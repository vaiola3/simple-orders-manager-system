<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    protected $repository;

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
            $payload = $this->repository->findAll();

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
    public function store(Request $request)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $this->repository->store($request->all());

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
            $payload = $this->repository->find($id);

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
    public function update(Request $request, $id)
    {
        $response_content = $this->generateDefaultResponse();
        $response_status = 500;

        try
        {
            $current_register = $this->repository->find($id);

            if ($this->isNotNull($current_register))
            {
                $new_values = $request->all();

                $this->repository->update($new_values, $id);

                $payload = $current_register;

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

        $current_register = $this->repository->find($id);

        if (isset($current_register))
        {
            try
            {
                $this->repository->destroy($id);

                $response_content['error'] = false;
                $response_content['message'] = 'Registro deletado com sucesso.';

                $response_status = 200;
            } 
            catch (Exception $e)
            {
                //
            }
        }
        else
        {
            $response_content['message'] = 'Registro inexistente!';
            $response_status = 202;
        }


        return response()->json($response_content, $response_status);
    }

    protected function generateDefaultResponse()
    {
        return array (
            'error' => true,
            'message' => 'Ocorreu um erro',
        );
    }

    protected function isNotNull($value)
    {
        return !is_null($value);
    }
}
