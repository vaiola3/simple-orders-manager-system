<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;

class HomeController extends Controller
{
    private $clientRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientRepository $clientRepo)
    {
        $this->middleware('auth');

        $this->clientRepository = $clientRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $args = array (
            'scene' => 'client.index',
            'tools' => array (
                'show' => true,
                'link' => route('clients.inactives.index'),
                'name' => 'Clientes Inativos'
            ),
            'pload' => $this->clientRepository->findAll()
        );

        return view('template.main', \compact('args'));
    }
}
