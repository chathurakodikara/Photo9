<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Photo;
use Livewire\Component;
use App\Services\FacebookImageSearvice;
use Illuminate\Support\Facades\Redirect;

class FacebookPhotoCard extends Component
{
    public $image;

     /**
     * uses FacebookImageSearvice to fetch the image and strore the path 
     * 
    **/
    public function addImageToCollection($image_id)
    {
        $facebook = new FacebookImageSearvice();
        $facebook_image = $facebook->show_image($image_id);
        $photo_count = Photo::count();
        if ($photo_count >= 9) {
            return redirect()->route('facebook-images')->with('error', 'Already selected 9 Photos !');
        }

        try {
            auth()->user()->photos()->updateOrCreate(['image_id' => $facebook_image['id']],[
                'description' => $facebook_image['name'] ?? '',
                'path' => $facebook_image['picture'],
                'image_id' => $facebook_image['id']
            ]);
            session()->flash('success-'.$image_id, 'Picture added to the collection');

        } catch (\Exception $e) {
            
            return redirect()->route('facebook-images')->with('error', 'General Exception : ' . json_encode($e->getMessage(), true));

        }catch (\Error $e) {
            return redirect()->route('facebook-images')->with('error', 'Error Exception : ' .json_encode($e->getMessage(), true));
        }
        
    }
    public function render()
    {
        return view('livewire.facebook-photo-card');
    }
}
