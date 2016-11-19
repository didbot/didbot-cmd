<?php

namespace DidbotCmd\Factories;
use GuzzleHttp\Client;

class GuzzleFactory
{
    public static function getClient()
    {
        $base_url = getenv('BASE_URL') ? getenv('BASE_URL') : 'https://didbot.com/api/1.0/';

        return new Client([
            'base_uri' => $base_url,
            'headers' => [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
                'Authorization' => 'Bearer ' . getenv('API_TOKEN'),
            ]
        ]);
    }
}