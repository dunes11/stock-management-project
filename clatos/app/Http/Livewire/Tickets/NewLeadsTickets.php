<?php

namespace App\Http\Livewire\Tickets;

use App\Models\leads;
use Livewire\Component;
use App\Models\new_leads_tickets;

class NewLeadsTickets extends Component
{
    public $newLeadTickets;
    public function mount()
    {
        $this->newLeadTickets = new_leads_tickets::all();
    }

    public function render()
    {
        return view('livewire.tickets.new-leads-tickets')->extends('layouts.app')->section('content');
    }
}
