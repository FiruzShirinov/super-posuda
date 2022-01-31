<?php

namespace App\Traits;

use App\Http\Requests\OrderRequest;
use App\Services\ProductService;

trait ParameterHandler
{
    public function params(OrderRequest $request)
    {
        $product = new ProductService;
        $params['filter']['manufacturer'] = $request->validated()['filter_manufacturer'];
        $params['filter']['name'] = $request->validated()['filter_name'];
        $params['order']['items']['offers']['id'] = $product->getStoreProducts($params)['products'][0]['offers'][0]['id'];
        $params['order']['status'] = 'trouble';
        $params['order']['orderType'] = 'fizik';
        $params['site'] = 'test';
        $params['order']['orderMethod'] = 'test';
        $params['order']['customerComment'] = $request->validated()['comments'];
        $params = array_merge_recursive($params,$this->fullname($request));
        $params['order'] = json_encode($params['order']);
        return $params;
    }

    public function fullname(OrderRequest $request)
    {
        $fullname = explode(" ", $request->validated()['fullname']);
        $name['order']['lastName'] = $fullname[0];
        $name['order']['firstName'] = $fullname[1];
        $name['order']['patronymic'] = $fullname[2];
        return $name;
    }
}
