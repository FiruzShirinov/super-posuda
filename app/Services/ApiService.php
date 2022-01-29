<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiService
{
    protected $superPosudaUrl, $superPosudaApiKey, $client, $parameters;

    public function __construct()
    {
        $this->client = new Client;
        $this->superPosudaUrl = env('SUPER_POSUDA_URL');
        $this->superPosudaApiKey = env('SUPER_POSUDA_API_KEY');
        $this->parameters = request()->except(['filter_manufacturer','filter_name','order_number','fullname','comments']);
        $this->parameters['apiKey'] = $this->superPosudaApiKey;
    }

    protected function getRequest(string $path = null)
    {
        $url = $this->superPosudaUrl.$path;

        try {
            $request = $this->client->get($url, ['query' => $this->parameters]);
        } catch(ClientException $e) {
            return $this->parseClientException($e);
        }

        $response = $request ? $request->getBody() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return json_decode($response, true);
        }

        return null;
    }

    protected function postRequest(string $path = null, ?array $params)
    {
        if(!empty($params)){
            $this->parameters = array_merge($this->parameters, $params);
        }

        $url = $this->superPosudaUrl.$path;

        try {
            $request = $this->client->post($url, ['query' => $this->parameters]);
        } catch(ClientException $e) {
            return $this->parseClientException($e);
        }

        $response = $request ? $request->getBody() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return json_decode($response, true);
        }

        return null;
    }

    private function parseClientException(ClientException $e)
    {
        return print_r(strstr($e->getMessage(), '{"'));
    }
}
