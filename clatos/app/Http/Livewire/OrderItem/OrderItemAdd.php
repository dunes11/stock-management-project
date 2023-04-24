<?php

namespace App\Http\Livewire\OrderItem;

use Livewire\Component;

class OrderItemAdd extends Component
{
    
    public function render()
    {
        return view('livewire.order-item.order-item-add')->extends('layouts.app')->section('content');;
    }
}
