<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Client;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use App\Repositories\DishRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ClientRepository;
use App\Http\Requests\StoreOrderRequest;
use App\Repositories\DeliveryTypeRepository;

class OrderController extends Controller
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
        $args = array (
            'title' => 'Listagem das encomendas atuais',
            'scene' => 'order.index',
            'pload' => $this->orderRepository->findAll(),
        );

        return view('entities.order.index', \compact('args'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        ClientRepository $clientRepo,
        DeliveryTypeRepository $deliveryTypeRepo,
        DishRepository $dishRepo
    ){
        $args = array (
            'title' => 'Cadastrar nova encomenda',
            'scene' => 'order.create',
            'pload' => $this->orderRepository
                ->getRelatedData($clientRepo, $deliveryTypeRepo, $dishRepo),
            'after' => route('orders.store')
        );

        return view('entities.order.create', \compact('args'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $this->orderRepository->store($request->all());

        return \redirect()->route('orders.index');
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
