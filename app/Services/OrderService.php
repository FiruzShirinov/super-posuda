<?php

namespace App\Services;

class OrderService extends ApiService
{
    public function postOrdersCreate(?array $params)
    {
        return $this->postRequest('orders/create', $params);
    }
}
