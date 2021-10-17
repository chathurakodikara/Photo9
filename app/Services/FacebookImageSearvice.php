<?php
namespace App\Services;

use App\Traits\FacebookResponse;
use Illuminate\Support\Facades\Http;

/**
 * keep all the api with facebook image loading
 */
class FacebookImageSearvice 
{
    /**
     * FacebookResponse traits use to cheque response of the api.
     */
    use FacebookResponse;
    /**
     *  show lates facebook images.  
     * using image_limit we can limit the photo count. default value is 100
     */
    
    public function load_lates_image($image_limit = 100)
    {
        $response = Http::get('https://graph.facebook.com/v12.0/me/photos', [
            'fields' => 'picture,name,created_time',
            'limit' => $image_limit,
            'type' => 'uploaded',
            'access_token' => auth()->user()->facebook_access_token,  
        ]);
   
        return $this->facebook_api_response($response);
    }

    /**
     * show individual image
     */
    public function show_image($image_id)
    {
        $response = Http::get('https://graph.facebook.com/v12.0/' . $image_id, [
            'fields' => 'picture,name,created_time',
            'access_token' => auth()->user()->facebook_access_token,
        ]);
     
        return $this->facebook_api_response($response);

    }
}

