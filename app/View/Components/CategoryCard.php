<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $image;
    public $desc;
    public function __construct($name="",$image="",$desc="")
    {
        $this->name = $name;
        $this->image = $image;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-card');
    }
}
