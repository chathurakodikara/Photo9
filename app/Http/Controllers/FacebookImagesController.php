<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\FacebookImageSearvice;

class FacebookImagesController extends Controller
{

    /**
     * FacebookImageSearvice contain all the api call to facebook
     */
   
    public function index()
    {
        $images = [];
        $images_searvice = new FacebookImageSearvice();
        $facebook_images = $images_searvice->load_lates_image(); 
        $photo_collection = Photo::all();

        /**
         * redirect back if the api false
         */
        if ($facebook_images['success'] == false) {
            return back()->withError($facebook_images['message']);
        }

        $images = $this->facebook_images_and_photo_from_collection($facebook_images, $photo_collection);

        return view('facebook_images.index', compact('images', 'facebook_images'));
    }

     /**
     * create a collection joining facebook images and users saved photos
    **/
    protected function facebook_images_and_photo_from_collection($facebook_images, $photo_collection)
    {
        return collect($facebook_images['response']['data'])->map(function ($image) use($photo_collection)
        {
            $is_image_in_the_collection = $photo_collection->where('image_id', $image['id'])->first() ? true : false;
            return [
                'picture' => $image['picture'],
                'name' =>  Str::limit($image['name'] ?? null, 25),
                'created_time' => Carbon::parse($image['created_time'])->diffForHumans(),
                'id' => $image['id'],
                'status' => $is_image_in_the_collection
            ];
        });
    }


}
