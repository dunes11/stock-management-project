<?php

namespace App\Http\Livewire;

use App\Models\lead_grab_request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LeadGrabRequest extends Component
{
    public $leads;
    public function mount()
    {
        $this->leads = lead_grab_request::all();
    }
    public function render()
    {
        return view('livewire.lead-grab-request')->extends('layouts.app')->section('content');
    }
    public function approve($req)
    {
        $data = lead_grab_request::find($req);
        $data->isApproved = 1;
        $data->changeByUser_id = Auth::id() ?? 1;
        $data->update();
        session()->flash('success', 'Grab request approved .');

    }
    public function reject($req)
    {
        session()->flash('success', 'Grab request deleted .');
        // $data = lead_grab_request::find($req);
        // $data->delete();
    }
}
