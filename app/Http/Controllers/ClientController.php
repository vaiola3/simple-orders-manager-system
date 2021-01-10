<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
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
        $args = array (
            'title' => 'Listagem dos clientes ativos',
            'scene' => 'client.index',
            'tools' => array (
                'show' => true,
                'link' => route('clients.inactives.index'),
                'name' => 'Clientes Inativos'
            ),
            'pload' => $this->clientRepository->findAll()
        );

        return view('entities.client.index', \compact('args'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $args = array (
            'title' => 'Cadastrar novo cliente',
            'scene' => 'client.create',
            'tools' => array (
                'show' => false,
            ),
        );

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
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $args = array (
            'title' => 'Listagem dos clientes ativos',
            'scene' => 'client.edit',
            'tools' => array (
                'show' => true,
                'link' => route('clients.index'),
                'name' => 'Voltar'
            ),
            'pload' => $this->clientRepository->findAll(),
            'tuple' => $this->clientRepository->find($id)
        );

        if(isset($args['tuple']))
        {
            $args['title'] = 'Editar dados do cliente';

            return view('entities.client.edit', \compact('args'));
        }
        else
        {
            return \redirect()->route('clients.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, $id)
    {
        $this->clientRepository->update($request->all(), $id);

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
        if ($this->clientRepository->hasOrders($id))
        {
            $name = $this->clientRepository->getName($id);

            $validator = Validator::make([], []);

            $validator
                ->getMessageBag()
                ->add('client', "Existem pedidos vinculados ao cliente {$name}");

            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $this->clientRepository->destroy($id);
        }

        return redirect()->route('clients.index');
    }
}
