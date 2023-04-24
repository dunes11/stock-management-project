<?php

namespace App\Http\Livewire\Invoice;

use App\Models\User;
use App\Models\leads;
use App\Models\company;
use App\Models\invoice;
use App\Models\product;
use Livewire\Component;
use App\Models\orderItem;

class Add extends Component
{
    public $post       = [];
    public $orderItems = [];

    public function mount($userName)
    {
        if (count($this->orderItems) === 0) {
            $this->addOrderItem();
        }
        // dd($userName);
        $this->post['lead_id']   = leads::select('id')->where('name', '=', $userName)->first()->id;
        $this->post['name']      = $userName;
        $this->companyData       = company::select('id', 'name')->get();
        $this->accountMangerData = User::select('id', 'name')->get();
        $this->orderItem         = orderItem::all();
        $this->productsData      = product::select('id', 'name')->get();
        // dd( $this->productsData);
    }

    public function addOrderItem()
    {
        $this->orderItems[] = ['product_id' => '', 'period' => '', 'quantity' => ''];
    }
    public function removeOrderItem($index)
    {
        unset($this->OrderItems[$index]);
        $this->refresh();
    }
    public function addInvoice()
    {
        dd($this->orderItems, $this->post);
        $newInvoice                    = new invoice();
        $newInvoice->lead_id           = $this->post['lead_id'];
        $newInvoice->name              = $this->post['name'];
        $newInvoice->expiryDate        = $this->post['expiryDate'];
        $newInvoice->remarks           = $this->post['remarks'];
        $newInvoice->taxAble           = $this->post['taxAble'] ?? "NULL";
        $newInvoice->includingGst      = $this->post['includingGst'];
        $newInvoice->company_id        = $this->post['company_id'];
        $newInvoice->accountManager_id = $this->post['accountManager_id'];
        $newInvoice->save();


        
    }
    public function render()
    {
        return view('livewire.invoice.add')
            ->extends('layouts.app')
            ->section('content');
    }
}
