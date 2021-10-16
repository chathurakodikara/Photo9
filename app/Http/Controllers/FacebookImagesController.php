<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\FacebookImageSearvice;

class FacebookImagesController extends Controller
{

    public function index()
    {
        $images_searvice = new FacebookImageSearvice();
        $facebook_images = $images_searvice->load_lates_image(); 
        $user_image_collection = auth()->user()->images;
  
        /**
         * create a collection joining facebook images and users saved images
        **/
        $images = collect($facebook_images['data'])->map(function ($image) use($user_image_collection)
        {
            $is_image_in_the_collection = $user_image_collection->where('item_id', $image['id'])->first() ? true : false;
            return [
                'picture' => $image['picture'],
                'name' =>  Str::limit($image['name'] ?? null, 25),
                'created_time' => Carbon::parse($image['created_time'])->diffForHumans(),
                'id' => $image['id'],
                'status' => $is_image_in_the_collection
            ];
        });

        return view('facebook_images.index', compact('images'));
    }


}
