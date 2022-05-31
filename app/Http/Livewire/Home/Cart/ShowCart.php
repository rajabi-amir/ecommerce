<?php

namespace App\Http\Livewire\Home\Cart;

use Livewire\Component;

class ShowCart extends Component
{
    public $cartitems;
    public $quantitypro;
    

    public function mount()
    {
        $this->cartitems = \Cart::getContent();
        dd(\Cart::getContent());
    }

    public function change()
    {

    }

    public function render()
    {
        return view('livewire.home.cart.show-cart')
        ->extends('home.layout.MasterHome')
        ->section('content');
        
    }
}