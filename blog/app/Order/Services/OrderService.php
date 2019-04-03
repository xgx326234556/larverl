<?php

namespace App\Order\Services;


use App\Order\Models\OrderModel;

class OrderService{

    protected $orderModel;
    public function __construct(OrderModel $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function order(){

        $this->orderModel->add();
    }
}