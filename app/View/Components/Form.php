<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $result;
    public $id;
    public $title;
    public $type;
    public $action;
    public $updateId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = "", $title = "", $type, $action = "", $updateId = "", $result = "")
    {
        $this->result = $result;
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->action = $action;
        $this->updateId = $updateId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
