<?php

namespace App\Models;

use App\Models\invoice;
use App\Models\order_item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

    use HasFactory;

    public function items()
    {
        return $this->hasMany(order_item::class, 'order_id', 'id');
    }
   
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'accountManager_id', 'id');
    }
    public function invoice()
    {
        return  $this->belongsTo(invoice::class, 'invoice_id', 'id');
    }
}
