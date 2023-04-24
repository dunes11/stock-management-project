<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\models\missed_call_tickets;

class MissedCallTickets extends Component
{
    public $missedCallTickets;
    public function mount()
    {
        $this->missedCallTickets = missed_call_tickets::all();
    }

    public function render()
    {
        return view('livewire.tickets.missed-call-tickets')->extends('layouts.app')->section('content');
    }
}
