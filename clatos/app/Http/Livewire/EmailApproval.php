<?php

namespace App\Http\Livewire;

use App\Models\email_approval;
use Livewire\Component;

class EmailApproval extends Component
{
    // public $email_approval;
    public function mount()
    {
        $this->emailApprovals = email_approval::all();
    }
    public function render()
    {
        return view('livewire.email-approval')
            ->extends('layouts.app')
            ->section('content');
    }
}
