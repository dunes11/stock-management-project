<?php

namespace App\Http\Livewire\Support;

use Livewire\Component;
use App\Models\support_complete;
class Complete extends Component
{
    public $supportCompleteList;
    public function mount()
    {
        $this->supportCompleteList =support_complete::all();
    }
    public function render()
    {
        return view('livewire.support.complete')->extends('layouts.app')->section('content');
    }
}
