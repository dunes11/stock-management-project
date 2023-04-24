<?php

namespace App\Http\Livewire\Task;
use App\Models\task_complete;
use Livewire\Component;

class Complete extends Component
{

    public $taskCompleteList;
    public function mount()
    {
        $this->taskCompleteList = task_complete::all();
    }
    public function render()
    {
        return view('livewire.task.Complete')->extends('layouts.app')->section('content');
    }
}
