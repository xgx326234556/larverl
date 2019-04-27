<?php

namespace App\Order\Http\Controllers;



use App\Order\Services\OrderService;

class OrderController
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(){
       $this->orderService->order();
   }
}
