<?php

namespace App\Http\Controllers;

use App\Helpers\AWSs3;
use App\Models\leads;
use App\Models\order;
use App\Models\invoice;
use App\Models\lead_graphic_plan;
use App\Models\graphic_lead_brand;
use App\Models\graphic_project;
use App\Models\hardware_change;
use App\Models\license;
use App\Models\callLogs;
use App\Models\Cart;
use App\Models\followUp;
use App\Models\lead_address;
use App\Models\lead_comment;
use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\email_recived;
use App\Models\lead_document;
use App\Models\lead_timeline;
use App\Models\email_outgoing;
use App\Models\support_ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class leadController extends Controller
{

    public function profile(leads $lead, Request $request)
    {

        $lead = $data['lead'] = $lead;
        // dd($data);
        // $addresses = lead_address::where('lead_id', $lead->id)->paginate(5);
        $addresses = lead_address::paginate(8);
        $plans = lead_graphic_plan::all();
        $carts=Cart::with('product','ProductVariant')->paginate(8);
        // dd($carts);
        // dd($addresses);
        return view('livewire.lead.pages.profile', compact('data','carts', 'lead', 'addresses', 'plans'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function contacts($lead)
    {
        $lead = $data['lead'] = leads::where('id', $lead)->with('contacts')->first();
        $contacts = leads::paginate(8);
        return view('livewire.lead.pages.contacts', compact('lead', 'contacts'));
    }
    public function invoices($lead)
    {
        $lead = $data['lead'] = leads::where('id', $lead)->with('leadInvoices')->first();
        $invoices = invoice::paginate(8);
        // dd($invoices);
        return view('livewire.lead.pages.invoices', compact('data', 'lead', 'invoices'));
    }
    public function timeline($lead)
    {
        $lead = $data['lead'] = leads::where('id', $lead)->with('logs')->first();
        // dd($lead);
        $logs = lead_timeline::all();
        return view('livewire.lead.pages.timeline', compact('data', 'lead', 'logs'));
    }
    public function tickets($lead)
    {
        $lead = $data['lead'] = leads::where('id', $lead)->with('leadTicket')->first();
        $tickets = support_ticket::paginate(8);

        return view('livewire.lead.pages.tickets', compact('data', 'lead', 'tickets'));
    }

    public function callLogs($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'callLogs');
        // return 'callLogs';
        $callLogs = callLogs::paginate(8);
        return view('livewire.lead.pages.callLogs', compact('lead', 'callLogs'));
    }
    public function followUps($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'followUps');
        $followUp = followUp::paginate(8);
        // return 'followUps';
        return view('livewire.lead.pages.followUps', compact('lead', 'followUp'));
    }
    public function comments($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'comments');
        // return 'comments';
        $comments = lead_comment::paginate(8);
        return view('livewire.lead.pages.comments', compact('lead', 'comments'));
    }
    public function emails($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'emails');
        // return 'emails';
        $sent = email_outgoing::all(); //->with('sing)
        $recived = email_recived::all();
        return view('livewire.lead.pages.emails', compact('lead', 'sent', 'recived'));
    }
    public function orders($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'orders');
        // return 'orders';
        $orders = order::with('items')->paginate(8);
        return view('livewire.lead.pages.orders', compact('lead', 'orders'));
    }
    public function transaction($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'transaction');
        // return 'transaction';
        $transactions = transactions::paginate(8);
        return view('livewire.lead.pages.transaction', compact('lead', 'transactions'));
    }
    public function documents($lead)
    {
        $lead = leads::find($lead);
        $document = lead_document::paginate(8);
        return view('livewire.lead.pages.documents', compact('lead', 'document'));
    }
    public function licence($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'licence');
        // return 'licence';
        $license = license::paginate(8);
        return view('livewire.lead.pages.licence', compact('lead', 'license'));
    }
    public function brands($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'brands');
        // return 'brands';
        // AWSs3::class;
        $brands = graphic_lead_brand::paginate(8);
        return view('livewire.lead.pages.brands', compact('lead', 'brands'));
    }
    public function projects($lead)
    {
        $lead = leads::find($lead);
        // dd($lead, 'projects');
        // return 'projects';
        $graphic = graphic_project::orderBy('ts', 'desc')->paginate(8);

        return view('livewire.lead.pages.projects', compact('lead', 'graphic'));
    }
    public function hardwarechange($lead)
    {
        $lead = leads::find($lead);
        $records = hardware_change::paginate(8);
        return view('livewire.lead.pages.hardwarechange', compact('lead', 'records'));
    }














    public function leadFlags(Request $request)
    {
        try {
            $field = $request->field;
            $lead = leads::find($request->lead_id);
            $lead->$field = $request->value;
            $lead->update();
            return response()->json([
                'success' => 'ok' // for status 200
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false // for status 200
            ]);
        }
    }
    public function addressEdit($id)
    {
        $id = Crypt::decrypt($id);
        $address = lead_address::find($id);
        $lead = leads::find($address->lead_id);
        $country = DB::table('country')->get();
        return view('livewire.lead.pages.address.edit', compact('address', 'lead', 'country'));
    }
    public function addressUpdate(Request $request)
    {
        if ($request->address_id) {
        } else {
            return back()->with('error', 'Invalid reqest')->withInput();
        }
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'companyName' => 'required',
            'name' => 'required',
            'gst' => 'nullable | regex : /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            //"/^(0[1-9]|[1-2][0-9]|3[0-5])([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([a-zA-Z0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/
            //      08AABCU9603R1ZN
            'state' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'city' => 'required',

        ], [
            'name.required' => 'Name is required',
            'gst.regex' => 'GST is invalid',
            // 'mobile.required' => 'Mobile is required',
            'country.required' => 'Country is required',
            'state.required' => 'State is required',
            'pincode.required' => 'Pincode is required',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
        ], [
            'email' => 'E-Mail',

        ]);

        //return back if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // $user = Auth::user();
        // dd($request->all());
        $addr_array = ['name', 'companyName', 'mobile', 'email', 'address', 'city', 'pincode', 'gst', 'state', 'country', 'isPrimary'];
        $leadAddress = lead_address::find(Crypt::decrypt($request->address_id));
        $allAddress =  lead_address::where('lead_id',  $leadAddress->lead_id)->get();
        $leadAddress->lead_id = $leadAddress->lead_id;

        if ($request->isPrimary == 1) {
            lead_address::where('lead_id', $leadAddress->lead_id)->update(['isPrimary' => 0]);
        }
        foreach ($addr_array as  $value) {
            $leadAddress->$value = $request->$value;
        }
        if ($allAddress->count() == 0) {
            $leadAddress->isPrimary = 1;
        } else {
            $leadAddress->isPrimary = $request->isPrimary ?? 0;
        }
        $leadAddress->datetime = date('Y-m-d H:i:s');
        $leadAddress->update();
        return redirect()->route('lead.profile', ['lead' => $leadAddress->lead_id])->with('success', 'Address added successfully');
    }
}
