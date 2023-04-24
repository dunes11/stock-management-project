<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderItem;

class Check extends Controller
{
    function list() {
        $orders = order::all();
    }
    public function getOrderItem($orderId)
    {
        $this->orderItemData = orderItem::where('order_id', '=', $orderId)->get();
    }
}
