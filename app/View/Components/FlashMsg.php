<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FlashMsg extends Component
{
    public $type, $key;

    /**
     * type and key are extenal inputs
     * 
     * type has to values success and error. using those values show the colors and icon
     * key is to identify which comonent to show with error or cesses message 
     *
     */
    public function __construct($type, $key)
    {
        $this->type = $type;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flash-msg');
    }
}
