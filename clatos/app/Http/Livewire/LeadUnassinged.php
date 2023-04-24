<?php

namespace App\Http\Livewire;

use App\Models\lead_for;
use App\Models\lead_unassinged;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class LeadUnassinged extends Component
{
    use WithPagination;
    public $leadUnassigned, $field, $selectedOption,
        $searchData, $sortField = 'date', $sortDirection = 'desc', $search,
        $editMode               = false, $date, $queryFor, $name, $leadFor;
    public $user_names      = [];

    public function updatedSelectedReportTo($value)
    {
        dd($value);
        $selected                       = explode('|', $value);
        $this->reports_to[$selected[0]] = $selected[1];
    }
    public function mount()
    {
        $this->leadUnassigned = lead_unassinged::with("leads_for")->get();
        $this->leadFor        = lead_for::get();
        $this->user           = User::get();
    }
    public function resetFilter()
    {
        $this->leadUnassigned = lead_unassinged::with("leads_for")->get();
        $this->leadFor        = lead_for::all();
    }
    public function render()
    {

        return view('livewire.lead-unassinged')->extends('layouts.app')->section('content');
    }
    public function search($searchData)
    {
        $this->leadUnassigned = lead_unassinged::with("leads_for")->where('name', 'like', $this->searchData)->get();
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField     = $field;
            $this->sortDirection = 'asc';
        }
        $this->leadUnassigned = lead_unassinged::with("leads_for")->orderBy($this->sortField, $this->sortDirection)->get();
    }
    public function filter()
    {
        $this->leadUnassigned = lead_unassinged::with("leads_for")->where('name', 'like', $this->name)
            ->orWhere('lead_for_id', 'like', $this->queryFor)->orWhere('date', 'like', $this->date)->get();
    }
}
