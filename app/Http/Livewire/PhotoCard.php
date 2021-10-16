<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;
use App\Services\FacebookImageSearvice;
use Illuminate\Support\Facades\Redirect;

class PhotoCard extends Component
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

        try {
            auth()->user()->images()->updateOrCreate(['item_id' => $facebook_image['id']],[
                'description' => $facebook_image['name'] ?? '',
                'path' => $facebook_image['picture'],
                'item_id' => $facebook_image['id']
            ]);
            session()->flash('success-'.$image_id, 'Picture added to the collection');

        } catch (\Exception $e) {
            return redirect()->route('facebook-images')->with('error', 'General Exception : ' . $e->getmessage());

        }catch (\Error $e) {
            return redirect()->route('facebook-images')->with('error', 'Error Exception : ' . $e->getmessage());
        }
        
    }
    public function render()
    {
        return view('livewire.photo-card');
    }
}
