<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Repositories\AddressRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ShowClientAddressesRequest;
use App\Http\Requests\StoreClientAddressesRequest;
use App\Http\Requests\CreateClientAddressesRequest;
use App\Http\Requests\DestroyClientAddressesRequest;
use App\Http\Requests\ManageClientAddressesRequest;

class AddressController extends Controller
{
    private $addressRepository;

    public function __construct (AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    private $titles = [
        'address.index' => 'Endereços de',
        'address.create' => 'Cadastrar novo endereço',
        'address.edit' => 'Editar dados do endereço',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        ShowClientAddressesRequest $request, 
        ClientRepository $clientRepo,
        $client_id
    ){
        $client_name = $clientRepo->getName($client_id);

        $args = array (
            'title' => "Listagem dos endereços do cliente {$client_name}",
            'scene' => 'address.index',
            'tools' => array (
                'show' => true,
                'tool' => array (
                    array (
                        'link' => route('clients.addresses.create', $client_id),
                        'name' => 'Novo',
                        'tone' => 'own-green'
                    ),
                    array (
                        'link' => route('clients.index'),
                        'name' => 'Voltar',
                        'tone' => 'own-orange'
                    ),
                )
            ),
            'pload' => $this->addressRepository->getAddressesByClientID($client_id)
        );

        return view('entities.address.index', \compact('args'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        CreateClientAddressesRequest $request,
        ClientRepository $clientRepo,
        $client_id
    )
    {
        $args = array (
            'title' => "Cadastrar novo endereço para {$clientRepo->getName($client_id)}",
            'scene' => 'client.address.create',
            'tools' => array (
                'show' => true,
                'tool' => array (
                    array (
                        'name' => 'Voltar',
                        'link' => route('clients.index'),
                        'tone' => 'own-orange'
                    )
                )
            ),
        );

        return view('entities.address.create', \compact('args'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientAddressesRequest $request, $client_id)
    {
        $this->addressRepository->store($request->all());

        $params = array ('client_id' => $client_id);

        return \redirect()->route('clients.addresses.index', $params);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($client_id)
    {
        $client = $this->addressRepository->getClientByID($client_id);

        $args = [
            'addresses' => Address::where('client_id', $client_id)->get(),
            'title' => "{$this->titles['address.index']} {$client->name}",
            'show_options' => true,
            'inactive_itens_route' => [
                'link' => route('clients.index'),
                'title' => 'Voltar'
            ],
            'current_view' => 'address.index'
        ];

        return view('entities.address.index', \compact('args'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Address $request, 
        ClientRepository $clientRepo, 
        $client_id, 
        $address_id
    ){
        $client = $clientRepo->find($client_id);

        $args = array (
            'title' => "Editar endereço de {$clientRepo->getName($client_id)}",
            'scene' => 'client.address.edit',
            'tools' => array (
                'show' => true,
                'tool' => array (
                    array (
                        'name' => 'Volter',
                        'link' => route('clients.addresses.index', $client_id),
                        'tone' => 'own-orange'
                    )
                    ),
            ),
            'pload' => $this->addressRepository->find($address_id)
        );

        return view('entities.address.edit', \compact('args'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(
        StoreClientAddressesRequest $request, 
        $client_id
    ){
        $this->addressRepository->update($request->all(), $client_id);

        return redirect()->route('clients.addresses.index', $client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        DestroyClientAddressesRequest $request,
        $client_id,
        $address_id
    ){
        $this->addressRepository->destroy(($address_id));

        $params = array ('client_id' => $client_id);

        return \redirect()->route('clients.addresses.index', $params); 
    }
}
