<?php

namespace App\Http\Livewire\Support;

use Livewire\Component;
use App\Models\support_processing;

class Processing extends Component
{
    public $supportProcessingList;
    public function mount()
    {
        $this->supportProcessingList = support_processing::all();
    }
    public function render()
    {

        return view('livewire.support.processing')->extends('layouts.app')->section('content');
    }
}


