<?php

namespace App\Http\Livewire\Lead;

use App\Models\leads;
use Livewire\Component;

class Profile extends Component
{
    public $lead;
    public function mount(leads $lead)
    {
        $this->lead = $lead;
    }
    public function render()
    {
        // dd($this->lead);
        return view('livewire.lead.profile')->extends('livewire.lead.layout')->section('content');
    }
}
