<?php

namespace App\Http\Livewire;

use App\Models\hardware_change;
use Livewire\Component;
use Livewire\WithPagination;

class HardwareChange extends Component
{
    use WithPagination;
    public $hwChange    ;
    public function mount()
    {
        $this->hwChange = hardware_change::get();
        // $this->hwChange = hardware_change::where('isApproved', 0)->get();
    }
    public function render()
    {
        return view('livewire.hardware-change')->extends('layouts.app')->section('content');
    }
}
