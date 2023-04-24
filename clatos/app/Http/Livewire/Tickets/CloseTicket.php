<?php

namespace App\Http\Livewire\Tickets;

use App\Models\close_tickets;
use Livewire\Component;

class CloseTicket extends Component
{
    public $closeTickets;
    public function mount()
    {
        $this->closeTickets = close_tickets::all();
    }

    public function render()
    {
        return view('livewire.tickets.close-ticket')->extends('layouts.app')->section('content');
    }
}
