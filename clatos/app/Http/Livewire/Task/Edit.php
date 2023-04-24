<?php

namespace App\Http\Livewire\Task;

use App\Models\task_edit;
use App\Models\task_all;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $post = [], $assignedBy_id, $assignedByName;
    public function mount($id)
    {
        $this->post = collect(task_all::find($id));
        $this->assignedToData  = User::select('id', 'name')->get();
    }
    public function render()
    {
        return view('livewire.task.edit')
            ->extends('layouts.app')
            ->section('content');
    }
    public function TaskFormEdit($id)
    {
        $newTask   = task_all::find($id);
        $validatedData = $this->validate(
            [
                'post.title'         => 'required',
                'post.details'       => 'nullable|string',
                'post.assignedTo_id' => 'required|integer',
            ], //validation for field which is required
            [
                'post.assignedTo_id.required' => 'The :attribute field is required.',
                'post,title.required'         => 'The :attribute field is required.',
            ], //msg for valdation error
            [
                'post.title'         => 'Title',
                'post.details'       => 'Details',
                'post.assignedTo_id' => 'Account Manager ID',
            ],
        ); //custom name for field for give in error
        try {
            $newTask->details       = $this->post['details'] ?? null;
            $newTask->title         = $this->post['title'] ?? null;
            $newTask->assignedTo_id = $this->post['assignedTo_id'] ?? null;
            $newTask->update();
        } 
        catch (QueryException $e) {
            dd($e->getMessage());
        }
        return redirect()->route('task.all');
    }
}
