<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id','id');
    }
    public function accountManager()
    {
        return $this->belongsTo(user::class, 'accountManager_id');
    }
    public function invoiceNumber()
    {
        // return $this->belongsTo(invoice::class, 'invoice_id');
    }
    
    use HasFactory;
}
