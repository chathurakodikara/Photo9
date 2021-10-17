<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * use Multitenantable traite inside the mode. as a result,
     * shows photos belongs to loged in user  
     * the Trait can be use any model. 
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }
}
