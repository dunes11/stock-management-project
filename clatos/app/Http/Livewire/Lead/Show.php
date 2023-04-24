<?php

namespace App\Http\Livewire\Lead;

use App\Models\leads;
use Livewire\Component;

class Show extends Component
{
    public $lead;
    public function mount($id)
    {
        $this->lead = collect(leads::find($id));
    }
    public function render()
    {
        return view('livewire.lead.show');
    }
}
