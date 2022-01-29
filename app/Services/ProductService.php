<?php

namespace App\Services;

class ProductService extends ApiService
{
    public function getStoreProducts()
    {
        return $this->getRequest('store/products');
    }
}
