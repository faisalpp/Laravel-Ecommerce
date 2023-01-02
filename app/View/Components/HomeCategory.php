<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $category;
    public $image;
    public function __construct($id="",$category = "",$image = "")
    {
        $this->id  =$id;
        $this->category = $category;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home-category');
    }
}
