<?php

namespace App\Traits;

use App\Services\ProductService;

trait ParameterHandler
{
    public function params()
    {
        $product = new ProductService;
        $params['order']['items']['offers']['id'] = $product->getStoreProducts()['products'][0]['offers'][0]['id'];
        $params['order']['status'] = 'trouble';
        $params['order']['orderType'] = 'fizik';
        $params['site'] = 'test';
        $params['order']['orderMethod'] = 'test';
        $params['filter']['manufacturer'] = request('filter_manufacturer');
        $params['filter']['name'] = request('filter_name');
        $params['order']['number'] = request('order_number');
        $params['order']['customerComment'] = request('comments');
        $params = array_merge_recursive($params,$this->fullname());
        return $params;
    }

    public function fullname()
    {
        $fullname = explode(" ",request('fullname'));
        $name['order']['customer']['lastName'] = $fullname[0];
        $name['order']['customer']['firstName'] = $fullname[1];
        $name['order']['customer']['patronymic'] = $fullname[2];
        return $name;
    }
}
