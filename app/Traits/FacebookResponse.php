<?php
namespace App\Traits;

trait FacebookResponse {

    public function facebook_api_response($response)
    {
        $response = $response->collect();

        if (isset($response['error'])) {
            return [
                'success' => false,
                'message' => $response['error']['message'],
                'code' =>  $response['error']['code'],
            ];

        }
    
        return  [
            'success' => true,
            'response' => $response,
        ];
    }
}