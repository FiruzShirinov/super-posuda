<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Traits\ParameterHandler;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    use ParameterHandler;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, OrderService $order)
    {
        $message = $order->postOrdersCreate($this->params($request));
        return redirect()->route('orders.create')->with(['message' => $message ]);
    }
}
