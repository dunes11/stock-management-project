<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\Models\cart_leads;


class CartLeads extends Component
{
    public $cartleads;
    public function mount()
    {
        $this->cartleads = cart_leads::all();
    }
    public function render()
    {

        return view('livewire.tickets.cart-leads')->extends('layouts.app')->section('content');
    }
}
