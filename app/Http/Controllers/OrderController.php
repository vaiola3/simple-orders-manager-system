<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\DeliveryType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $args = [
            'title' => 'Listagem das encomendas atuais',
            'show_options' => false,
            'orders' => Order::all(),
            'current_view' => 'order.index',
            'inactive_itens_route' => [],
        ];

        return view('entities.order.index', \compact('args'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $args = [
            'title' => 'Cadastrar novo pedido',
            'show_options' => false,
            'current_view' => 'order.create',
        ];

        return view('entities.order.create', \compact('args'));
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
        $args = [
            'title' => 'Listagem das encomendas atuais',
            'show_options' => false,
            // 'order' => Order::find($id),
            'current_view' => 'order.index',
            'inactive_itens_route' => [],
        ];

        $order = Order::find($id);

        if (isset($order))
        {
            $args['order'] = $order;

            $args['clients'] = Client::all();
            $args['delivery_types'] = DeliveryType::all();

            return view('entities.order.edit', \compact('args'));
        }

        return redirect()->route('orders.index');
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
        return "orders delete {$id}";
    }
}
