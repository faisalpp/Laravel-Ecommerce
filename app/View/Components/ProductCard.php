<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image;
    public $name;
    public $desc;
    public $price;
    public $id;
    public $product;
    public function __construct($product="",$id="",$image="",$price="",$desc="",$name="")
    {
        $this->product = $product;
        $this->image = $image;
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
