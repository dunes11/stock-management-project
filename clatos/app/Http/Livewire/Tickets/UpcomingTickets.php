<?php

namespace App\Http\Livewire\Tickets;

use App\Models\upcoming_tickets;
use Livewire\Component;

class UpcomingTickets extends Component
{
    public $upcomingTickets;
    public function mount()
    {
        $this->upcomingTickets = upcoming_tickets::all();
    }
    public function render()
    {
        return view('livewire.tickets.upcoming-tickets')->extends('layouts.app')->section('content');
    }
}
