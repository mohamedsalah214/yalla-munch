<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartShow extends Component
{
    public $items;

    // نستقبل array بدل model
    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('components.cart-show');
    }
}
