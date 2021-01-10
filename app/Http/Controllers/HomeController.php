<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view_name = 'home';

        $args = [
            // 'clients' => Client::all(),
            // 'title' => $this->titles[$view_name],
            'show_options' => true,
            'inactive_itens_route' => [
                'link' => route('clients.inactives.index'),
                'title' => 'Clientes Inativos'
            ],
            'current_view' => $view_name
        ];

        return view('template.main', \compact('args'));
    }
}
