<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\leads;
use Livewire\Component;
use App\Models\lead_status;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Lead extends Component
{
    public $name;
    public $leads;
    public $leadStatus;

    public $date = '';
    public $advFilter = ['isBookmark' => true];
    public $sortBy = 'asc', $sortField = 'id', $perPage = 8, $search = '', $searchFiled = 'name';

    public function mount()
    {
        $this->leads = leads::get();
        // Collection
    }
    public function render()
    {
        $lead_status = lead_status::all();
        // $users=User::where('isAvailableForLead',1)->get(['id','name']);
        $users = User::get(['id', 'name']);
        // dd($users);
        return view('livewire.lead.list', compact('lead_status', 'users'), [
            'leads' => \App\Models\leads::where($this->searchFiled, $this->search)
                ->orderBy($this->sortField, $this->sortBy ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ])->extends('layouts.app')->section('content');
    }
    // public function searchByNameID()
    // {
    //     // $search = '%' . $this->name . '%';
    //     // dd($this->leads);
    //     // $collection = $this->leads->whereIn('name',  $search);
    //     // dd($collection);
    //     // $this->leads = $collection->all();
    // }
    public function searchByDate()
    {
        if (empty($this->date)) {
            session()->flash('message', 'Select Or Change date');
            return false;
        }
        $search =  explode('to', $this->date);
        // dd($search, $this->date);
        if (isset($search[1])) {
            $this->leads = leads::whereBetween('date', [$search[0], $search[1]])->orwhere('id', 'like', $search)->get();
        } else {
            $this->leads = leads::where('date', $search[0])->orwhere('id', 'like', $search)->get();
        }
    }
    public function advanceFilter()
    {
        // dd($this->advFilter);
        $collection = leads::query();

        // dd($collection->relations);
        foreach ($this->advFilter as $key => $field) {
            // dd($key, $field);
            if ($field == true) {
                $collection->orWhere($key, 1);
            }
        }
        // dd($collection->get());
        $this->leads = $collection->get();
    }

    public function updateleadFlag($column, $id, $value)
    {
        // dd($column, $id, $value);
        $lead = leads::find($id);
        $lead->$column = $value;
        $lead->update();
    }
    public function resetFilter()
    {
        $this->leads = leads::orderBy('date', 'desc')->get();
    }
    //update 19-4-23
    public function customSort($field)
    {
        // dd($field);
        $this->leads = $this->leads->sortBy($field, 0, $this->sortBy == 'asc' ? true : false);
        $this->sortBy = $this->sortBy == 'asc' ? 'desc' : 'asc';
        // dd($this->sortBy);

        // dd($this->leads->all());
    }
    public function updatedleadStatus($value)
    {
        $data = explode('-', $value);
        $leadID = $data[1];
        $value = $data[0];
        $lead = leads::find($leadID);
        $lead->lead_status_id = $value;
        $lead->update();
        session()->flash('success', 'Status Updated . ');
    }
    public function changeManager(leads $lead, $user)
    {
        $lead->assignedTo_id = $user;
        $lead->update();
        session()->flash('success', 'Manager Updated . ');
    }



    // 19-4-23
    public function updatedname()
    {
        $name = $this->name;
        if (!Str::length($name) < 1) {
            $collection = ($this->leads->filter(function ($item) use ($name) {
                // replace stristr with your choice of matching function
                return false !== stristr($item->name, $name);
            }));
            $this->leads = $collection;
        } else {
            $this->leads = leads::orderBy('date', 'desc')->get();
        }
    }
}
