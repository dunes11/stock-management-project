<?php
namespace App\Http\Livewire\Support;

use App\Models\support_pending;
use Livewire\Component;

class Pending extends Component
{
    public $supportPendingList;
    public function mount()
    {
        $this->supportPendingList = support_pending::all();
    }
    public function render()
    {

        return view('livewire.support.pending')->extends('layouts.app')->section('content');
    }
}
