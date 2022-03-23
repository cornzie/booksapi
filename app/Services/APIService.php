<?php

namespace App\Services;
use GuzzleHttp\Client;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

trait APIService{
    
    public function getIceAndFire(string $endpoint = '', array $query = [])
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.anapioficeandfire.com/api/',
            // You can set any number of default request options.
            'timeout'  => 10.0,
        ]);

        try{

            $response = $client->request('GET', $endpoint, [
                'query' => $query,
            ]);

            $body = json_decode($response->getBody(), true);

            
            
            return [
                'body' => $body,
                'header' => $response->hasHeader('Link') ? $response->getHeader('Link') : ''
            ];;


        } catch(\Throwable $th)
        {
            //
            Log::debug('APICallFailed', [
                'exception' => $th->getMessage(),
                'line' => __LINE__,
                'file' => __FILE__,
            ]);

            return false;
        }
    }
}