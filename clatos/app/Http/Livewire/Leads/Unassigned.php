<?php

namespace App\Http\Livewire\Leads;

use App\Models\User;
use App\Models\leads;
use Livewire\Component;
use App\Models\lead_unassinged;

class Unassigned extends Component
{
    public $leads, $leadID, $userID, $assigntousername;

    protected $listeners = ['confirmUserChange' => '$refresh'];
    public function mount()
    {
        $this->leads = lead_unassinged::get();
    }
    public function render()
    {
        $users = leadUsers();
        return view('livewire.leads.unassigned', compact('users'))->extends('layouts.app')->section('content');;
    }


    public function UserChange(leads $lead, $user)
    {
        $lead->assignedTo_id = $user;
        $lead->update();
        session()->flash('success', 'Manager Assigned . ');
    }
}
