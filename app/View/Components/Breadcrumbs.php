<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Breadcrumbs extends Component
{

    public $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @param $breadcrumbs
     */
    public function __construct($breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.breadcrumbs');
    }
}
