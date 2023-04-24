<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order_item extends Model
{
    protected $table = 'order_item';
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
