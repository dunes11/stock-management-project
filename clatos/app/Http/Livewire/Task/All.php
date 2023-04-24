<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\task_all;
class All extends Component
{

     public $taskAllList;
    public function mount()
    {
        $this->taskAllList = task_all::all();
    }
    public function render()
    {
        return view('livewire.task.all')->extends('layouts.app')->section('content');
    }
}
