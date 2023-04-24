<?php

namespace App\Http\Livewire;

use App\Models\not_in_crm;
use Livewire\Component;

class NotInCrm extends Component
{
    public $notInCrm;
    public function mount()
    {
        $this->notInCrm = not_in_crm::all();
    }
    public function render()
    {
        return view('livewire.not-in-crm')->extends('layouts.app')->section('content');
    }
}
