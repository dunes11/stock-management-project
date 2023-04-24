<?php

namespace App\Http\Livewire\Lead;

use App\Models\User;
use App\Models\leads;
use Livewire\Component;
use App\Models\lead_for;
use App\Models\lead_source;
use App\Models\lead_status;
use Illuminate\Database\QueryException;
// use Illuminate\Support\MessageBag;
// use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public $post = [];
    public $interestedIn;
    public function mount($id)
    {
        $this->post = collect(leads::find($id));

        if ($this->post['lead_for_ids'] != null) {
            $this->interestedIn = explode(',', $this->post['lead_for_ids']);
        } else {
            $this->interestedIn = ['1'];
        }
    }
    public function render()
    {
        $leadFor = lead_for::all();
        $leadSource = lead_source::all();
        $leadStatus = lead_status::all();
        $accManagers = User::where('isAvailableForLead', 1)->get();
        return view('livewire.lead.edit', compact('leadFor', 'leadStatus', 'leadSource', 'accManagers'))->extends('layouts.app')->section('content');
    }
    public function leadUpdate($id)
    {
        $lead = leads::find($id);
        // dd($lead);
        $validatedData = $this->validate(
            [
                'post.email' => 'nullable|unique:lead,email,' . $lead->id,
                'post.name' => 'required|min:3',
                'post.mobile' => 'required|min:12|numeric',

            ],
            [
                'post.*.numeric' => ':attribute must be digits . ',
                'post.*.min' => 'At least :min words in :attribute.',
                'post.*.required' => 'The :attribute cannot be empty.',
                'post.*.email' => 'The :attribute format is not valid.',
                'post.*.unique' => ':attribute Already Exist.'
            ],

            [
                'post.email' => 'Email Address',
                'post.name' => 'Name',
                'post.mobile' => 'Mobile number',
            ]
        );
        try {
            $lead->name = $this->post['name'] ?? null;

            $lead->country = $this->post['country'] ?? null;
            $lead->state = $this->post['state'] ?? null;
            $lead->pincode = $this->post['pincode'] ?? null;
            $lead->email = $this->post['email'] ?? null;
            $lead->city = $this->post['city'] ?? null;
            $lead->gst = $this->post['gst'] ?? null;
            // $lead->mobile = $this->post['mobile'] ?? null;
            $list = (implode(',', $this->interestedIn));
            // dd(($list), $this->interestedIn );
            $lead->lead_for_ids = $list;
            $lead->remarks = $this->post['remarks'] ??  $lead->remarks ?? null;
            $lead->lead_source_id = $this->post['lead_source_id'] ?? null;
            $lead->assignedTo_id = $this->post['assignedTo_id'] ?? null;
            $lead->company = $this->post['companyName'] ?? null;
            $lead->update();
            
            return redirect()->route('leads')->with('success', 'Lead successfully Updated.');
            
        } catch (QueryException   $e) {
            dd($e->getMessage());
        }
    }
}
