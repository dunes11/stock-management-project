<?php

namespace App\Http\Livewire\Order;

// use session;
use DateTime;
use Illuminate\Support\Facades\Session;
use App\Models\leads;
use App\Models\orders;
use App\Models\product;
use Livewire\Component;
use App\Models\orderItem;
use Illuminate\Support\Facades\Auth;


class OrderAdd extends Component
{
    public $product , $lead , $details , $orderItems = [] , $post = [];
    public $order_items = [];
    public $period;
    public $quantity;
    public $remark;
    public $lead_id;
    public $productItem;

    public function mount($leadId) {

        $this->product  = product::all();
        $this->lead = Leads::select('name', 'id')->where('id',$leadId)->first();    
        $this->details = [
            'product' => $this->product,
            'lead' => $this->lead
        ];
        $this->lead_id = $leadId;
    }
    public function addOrderItem() {
        // dd($lead_id);
        if(empty($this->productItem) && empty($this->period) && empty($this->quantity)) {

            session()->flash('message', 'Product , Quantity , period can not be blank.');
            return false;

        } elseif (empty($this->productItem)) {

            session()->flash('danger', 'Product can not be blank.');
            return false;

        } elseif (empty($this->period)) {

            session()->flash('danger', 'period can not be blank.');
            return false;
            
        } elseif (empty($this->quantity)) {

            session()->flash('danger', 'Quantity can not be blank.');
            return false;
        }
        $this->order_items[] = [
            'product' => $this->productItem,
            'period' => $this->period,
            'quantity' => $this->quantity

        ];

        $this->productItem = '';
        $this->period = '';
        $this->quantity = '';

    }
    public function delOrderItem($key) {
        unset($this->order_items[$key]);
    }    
    public function orderAddSubmit()
    {      
        try {
            $newOrder = new orders;
            $newOrderItem = new orderItem;

            $newOrder->lead_id = $this->lead_id ?? null;
            $newOrder->remarks = $this->remark ?? null;
            $newOrder->date = new DateTime('now') ?? null;
            $newOrder->accountManager_id = Auth::id() ?? null;            

            $newOrder->save();
            $lastOrderId = $newOrder->id;
            foreach ($this->order_items as $key => $value) {
                $data = explode(',', $value['product']);
                $product_id = $data['0'];
                $newOrderItem->order_id = $lastOrderId ?? null;
                $newOrderItem->product_id = $product_id ?? null;
                $newOrderItem->period = $value['period'] ?? null;
                $newOrderItem->quantity = $value['quantity'] ?? null;
                $newOrderItem->save();
            }
            session()->flash('success', 'Order successfully created.');
            return redirect()->route('login');

        } catch (QueryException   $e) {
            dd($e->getMessage());
        }
    }
    
    public function render()
    {       
        return view('livewire.order.order-add')->extends('layouts.app')->section('content');
    }
}
