<?php

namespace App\Http\Livewire\Tickets;

use App\models\incoming_call_tickets;
use Livewire\Component;

class IncomingCallTickets extends Component
{
    public $incomingCallTickets;
    public function mount()
    {
        $this->incomingCallTickets = incoming_call_tickets::all();
    }

    public function render()
    {
        return view('livewire.tickets.incoming-call-tickets')->extends('layouts.app')->section('content');
    }
}
