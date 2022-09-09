<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalPopUp extends Component
{
    public $id;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title = "Modal popup")
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-pop-up');
    }
}
