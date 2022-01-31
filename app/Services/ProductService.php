<?php

namespace App\Services;

class ProductService extends ApiService
{
    public function getStoreProducts(?array $params)
    {
        return $this->getRequest('store/products', $params);
    }
}
