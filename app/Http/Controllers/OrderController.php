<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Traits\ParameterHandler;

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
    public function store(OrderService $order)
    {
        $order->postOrdersCreate($this->params());
        return redirect()->route('orders.create');
    }
}
