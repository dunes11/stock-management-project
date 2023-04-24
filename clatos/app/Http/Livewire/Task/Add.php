<?php

namespace App\Http\Livewire\Task;
use App\Models\task_add;
use App\Models\User;
use Livewire\Component;

class Add extends Component
{
    public $post = [],$assignedBy_id,$assignedByName;
    public function mount()
    {
        $this->filter = [
    'accountManagerName' => null,
];

        $this->assignedByName=auth()->user()->name ;
        $this->post['assignedBy_id']=User::select('id')->where('name','=',$this->assignedByName)->first()->id;
        $this->assignedToData = User::select('id', 'name')->get();
      
    }
    public function render()
    {
        // dd($this->assignedBy_id);   
        return view('livewire.task.add')
            ->extends('layouts.app')
            ->section('content');
    }
    public function TaskFormSubmit()
    {
        // dd($this->post);
        $validatedData = $this->validate(
            [
                'post.title' => 'required',
                'post.details' => 'nullable|string',
                'post.assignedTo_id' => 'required|integer',
            ], //validation for field which is required
            [
                'post.assignedTo_id.required' => 'The :attribute field is required.',
                'post,title.required' => 'The :attribute field is required.',
            ], //msg for valdation error
            [
                'post.title' => 'Title',
                'post.details' => 'Details',
                'post.assignedTo_id' => 'Account Manager ID',
            ],
        ); //custom name for field for give in error
        try {
            $newTask = new task_add();
            $newTask->details = $this->post['details'] ?? null;
            $newTask->title = $this->post['title'] ?? null;
            $newTask->assignedTo_id = $this->post['assignedTo_id'] ?? null;
            $newTask->assignedBy_id = $this->post['assignedBy_id'] ?? null;

            $newTask->save();
        } catch (QueryException $e) {
            dd($e->getMessage());
        }

        return redirect()->route('task.all');
    }
}
