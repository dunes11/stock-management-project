<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\transactions;

class Transaction extends Component
{
    public $transactions;
    public function mount(){
        $this->transactions=transactions::get();
    }
    public function render()
    {
        return view('livewire.transaction')->extends('layouts.app')->section('content');
    }
}
