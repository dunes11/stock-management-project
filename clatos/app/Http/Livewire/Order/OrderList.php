<?php

namespace App\Http\Livewire\Order;

use App\Models\orders;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class OrderList extends Component
{
    use WithPagination;
    //public $paginate = 'bootstrap';
    protected $orders;
    public $serach = '', $sortBy = 'date', $sortDirection = 'desc' , $field;

    public function mount() {   //this function only call first time and 1 time  on page load
        $this->orders = orders::paginate(3);
    }
    public function sortBy($field) //sorting function
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortBy = $field;
        $this->orders = orders::join('lead','lead.id', '=','order.lead_id')->join('user','user.id','=','order.accountManager_id')
        ->orderBy($this->sortBy,$this->sortDirection)->get(['lead.name','user.name','order.*']);
    }
    public function search() {
    }
    public function render() //call every time
    {
        return view('livewire.order.order-list',['orders' => orders::paginate(3)])->extends('layouts.app')->section('content');
        
    }
}









