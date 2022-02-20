<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function getFilm(Request $request)
    {
        $title = $request->query('title');

        $apiEndpoin = 'https://www.omdbapi.com';
        $apiParams = [
            'apiKey' => '72dce447',
            't' => $title
        ];

        try {
            $client = new \GuzzleHttp\Client(['verify' => false ]);
            $response = $client->request('GET', $apiEndpoin, ['query' => $apiParams]);
       
            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'titleDetails' => $responseBody
            ]);    
        } catch (exception $e) {
            return response()->json([
                'success' => false
            ]);
        }
    }
}
