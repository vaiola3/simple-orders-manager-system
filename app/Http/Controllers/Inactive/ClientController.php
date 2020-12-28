<?php

namespace App\Http\Controllers\Inactive;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $titles = [
        'client.inactives' => 'Listagem dos clientes inativos'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        $view_name = 'client.inactives';

        $args = [
            'clients' => $client->onlyTrashed()->get(),
            'title' => $this->titles[$view_name],
            'show_options' => true,
            'inactive_itens_route' => [
                'link' => route('clients.index'),
                'title' => 'Voltar'
            ],
            'current_view' => $view_name
        ];

        if ($args['clients']->count())
        {
            return view('entities.client.inactives', \compact('args'));
        }
        else
        {
            return redirect()->route('clients.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $client = Client::onlyTrashed()->find($id);

        if (isset($client))
        {
            $client->restore();
            $client->save();
        }

        return redirect()->route('clients.inactives.index');
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
}
