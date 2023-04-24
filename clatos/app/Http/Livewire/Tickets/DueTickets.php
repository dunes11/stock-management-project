<?php

namespace App\Http\Livewire\Tickets;

use App\Models\due_tickets;
use Livewire\Component;

class DueTickets extends Component
{
    public $dueTickets;
    public function mount()
    {
        $this->dueTickets = due_tickets::all();
    }

    public function render()
    {
        return view('livewire.tickets.due-tickets')->extends('layouts.app')->section('content');
    }
}
