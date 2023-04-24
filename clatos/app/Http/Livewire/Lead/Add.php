<?php

namespace App\Http\Livewire\Lead;

use Exception;
use Throwable;
use App\Models\User;
use App\Models\leads;
use Livewire\Component;
use App\Models\lead_for;
use App\Models\lead_source;
// use App\Http\Livewire\Lead;
// use Illuminate\Support\MessageBag;
use Illuminate\Database\QueryException;
// use Illuminate\Support\Facades\Validator;
use PDOException;

class Add extends Component
{
    // public $sessionVeriable = [];
    public $post = [];
    public function render()
    {
        $leadFor = lead_for::all();
        $leadSource = lead_source::all();
        $accManagers = User::where('isAvailableForLead', 1)->get();
        return view('livewire.lead.add', compact('leadFor', 'leadSource', 'accManagers'))->extends('layouts.app')->section('content');
    }
    public function leadFormsubmit()
    {
        // MessageBag::class;
        $validatedData = $this->validate(
            [
                'post.email' => 'email|unique:user,email',
                'post.name' => 'required|min:3',
                'post.mobile' => 'required|min:12|numeric|unique:lead_contact,mobile',
                // 'post.gst'=>'regex:',
            ],
            [
                'post.mobile.min_digits' => 'hello',
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
            $newLead = new leads;
            $newLead->name = $this->post['name'] ?? '';
            $newLead->lead_for_ids = $this->post['lead_for_id'] ?? null;
            $newLead->country = $this->post['country'] ?? '';
            $newLead->state = $this->post['state'] ?? null;
            $newLead->pincode = $this->post['pincode'] ?? null;
            $newLead->email = $this->post['email'] ?? null;
            $newLead->city = $this->post['city'] ?? null;
            $newLead->gst = $this->post['gst'] ?? null;
            $newLead->mobile = $this->post['mobile'] ?? null;
            $newLead->remarks = $this->post['remark'] ?? null;

            if (isset($this->post['lead_source_id'])) {
                if ($this->post['lead_source_id'] != null) {
                    $newLead->lead_source_id = ($this->post['lead_source_id']);
                }
            }
            // $newLead->lead_source_id = $this->post['lead_source_id'];
            if (isset($this->post['assignedTo_id'])) {
                if ($this->post['assignedTo_id'] != null) {
                    $newLead->assignedTo_id = ($this->post['assignedTo_id']);
                }
            }
            $newLead->company = $this->post['companyName'] ?? null;
            $newLead->save();
            session()->flash('success', 'Lead successfully created.');
            return redirect()->route('leads');
        } catch (QueryException   $e) {
            dd($e->getMessage());
            session()->flash('error', 'Something went wrong while processing your request. We apologize for any inconvenience caused.');
            // return redirect()->back();
        }
    }
}
