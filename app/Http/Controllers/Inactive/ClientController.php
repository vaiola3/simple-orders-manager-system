<?php

namespace App\Http\Controllers\Inactive;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function index(Client $client)
    {
        $view_name = 'client.inactives';

        $args = array (
            'title' => 'Listagem dos clientes inativos',
            'scene' => 'client.inactives',
            'tools' => array (
                'show' => true,
                'link' => route('clients.index'),
                'name' => 'Voltar'
            ),
            'pload' => $this->clientRepository->inactivesFindAll()
        );

        if ($args['pload']->count())
        {
            return view('entities.client.inactives', \compact('args'));
        }
        else
        {
            if (url()->previous() == route('clients.index'))
            {
                $validator = Validator::make([], []);

                $validator
                    ->getMessageBag()
                    ->add('client', "Não existem clientes inativos.");

                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                return redirect()->route('clients.index');
            }
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
