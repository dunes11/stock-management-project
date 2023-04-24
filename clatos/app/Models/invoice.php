<?php

namespace App\Models;

use App\Models\invoiceItemInr;
use App\Models\invoiceItemUsd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoice extends Model
{
    protected $table ='invoice';
    public $timestamps = false;
    use HasFactory;
    public function items()
    {
        return $this->hasMany(invoice_item::class, 'invoice_id', 'id');
    }
}
