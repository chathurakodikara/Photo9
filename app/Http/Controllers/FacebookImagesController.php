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
     * create a collection joining facebook images and users saved photos
    **/
    public function index()
    {
        $images_searvice = new FacebookImageSearvice();
        $facebook_images = $images_searvice->load_lates_image(); 
        $photo_collection = Photo::all();

        $images = collect($facebook_images['data'])->map(function ($image) use($photo_collection)
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

        return view('facebook_images.index', compact('images'));
    }


}
