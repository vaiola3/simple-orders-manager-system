<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    private $titles = [
        'client.index'  => 'Listagem dos clientes ativos',
        'client.create' => 'Cadastrar novo cliente',
        'client.edit'   => 'Editar dados do cliente',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $args = [
            'title'                 => $this->titles['client.index'],
            'current_view'          => 'client.index',

            'show_options'          => true,
            'inactive_itens_route'  => [
                'link'  => route('clients.inactives.index'),
                'title' => 'Clientes Inativos'
            ],

            'clients'               => Client::all(),
        ];

        return view('entities.client.index', \compact('args'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $args = [
            'title'         => $this->titles['client.create'],
            'current_view'  => 'client.create',

            'show_options'  => false,
        ];

        return view('entities.client.create', \compact('args'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client();

        if (isset($client))
        {
            $client->name = $request->input('name');
            $client->contact = $request->input('contact');

            $client->save();
        }

        return \redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $args = [
            'show_options'          => true,
            'inactive_itens_route'  => [
                'link'  => route('clients.index'),
                'title' => 'Voltar'
            ],
            'current_view'          => 'client.edit',
        ];

        $client = Client::find($id);

        if(isset($client))
        {
            $args['title'] = $this->titles['client.edit'];
            $args['client'] = $client;

            return view('entities.client.edit', \compact('args'));
        }
        else
        {
            $args['clients'] = Client::all();

            return view('entities.client.index', \compact('args'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StireClientRequest $request, $id)
    {
        $client = Client::find($id);

        if (isset($client))
        {
            $client->name = $request->input('name');
            $client->contact = $request->input('contact');

            $client->save();
        }

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if (isset($client))
        {
            if (Order::where('client_id', $id)->count() > 0)
            {
                $validator = Validator::make([], []);

                $validator
                    ->getMessageBag()
                    ->add('client', "Existem pedidos vinculados ao cliente {$client->name}.");

                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                $client->delete();
            }
        }

        return redirect()->route('clients.index');
    }
}
