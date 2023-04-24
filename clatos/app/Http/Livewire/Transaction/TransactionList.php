<?php

namespace App\Http\Livewire\Transaction;

use App\Models\transactions;
use Livewire\Component;

class TransactionList extends Component
{
    public $transactions;
    public function mount()
    {
        
        $this->transactions = transactions::get();
    }
    public function render()
    {
        return view('livewire.transaction.transaction-list')->extends('layouts.app')->section('content');
    }
}
