<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmptyState extends Component
{
    public $width;

    public $height;

    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $width = 300, $height = 300)
    {
        $this->width = $width;
        $this->height = $height;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.empty-state');
    }
}
