<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class support_complete extends Model
{
    protected $table = 'support_ticket_complete';

    use HasFactory;
     public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assignedTo_id', 'id');
    }
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assignedBy_id', 'id');
    }
     public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
