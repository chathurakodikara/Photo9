<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

# keep all the api with facebook image loading
class FacebookImageSearvice 
{
    # show lates facebook images.  
    # using image_limit we can limit the photo count. default value is 100
    public function load_lates_image($image_limit = 100)
    {
        $response = Http::get('https://graph.facebook.com/v2.8/me/photos', [
            'fields' => 'picture,name,created_time',
            'limit' => $image_limit,
            'type' => 'uploaded',
            'access_token' => auth()->user()->facebook_access_token,
        ]);

        if ($response->failed()) {
            dd( $response->status());
        }

        return  $response->collect();
    }

    // show individual image
    public function show_image($image_id)
    {
        $response = Http::get('https://graph.facebook.com/v2.8/' . $image_id, [
            'fields' => 'picture,name,created_time',
            'access_token' => auth()->user()->facebook_access_token,
        ]);

        if ($response->failed()) {
            dd( $response->collect());
        }

        return  $response->collect();
    }
}

