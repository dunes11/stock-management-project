<?php

namespace App\Http\Livewire\Task;

use App\Models\task_pending;
use Livewire\Component;

class Pending extends Component
{

    public $taskPendingList;
    public function mount()
    {
        $this->taskPendingList = task_pending::all();
    }
    public function render()
    {
        return view('livewire.task.Pending')->extends('layouts.app')->section('content');
    }
}
