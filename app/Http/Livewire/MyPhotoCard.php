<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;

class MyPhotoCard extends Component
{
    public $photo;

    public function deleteFromTheCollection(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photo.index');
    }
    public function render()
    {
        return view('livewire.my-photo-card');
    }
}
