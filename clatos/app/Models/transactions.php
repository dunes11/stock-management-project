<?php

namespace App\Models;

use App\Models\company;
use App\Models\invoice;
use App\Models\leads;
use App\Models\payment_mode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $table = 'lead_transaction';
    public $timestamps = false;
    use HasFactory;
    public function payment_mode()
    {
        return $this->belongsTo(payment_mode::class, 'paymentMode_id', 'id');
    }
    public function invoice()
    {
        return $this->belongsTo(invoice::class, 'invoice_id', 'id');
    }
    public function companyName()
    {
        return $this->belongsTo(company::class, 'company_id', 'id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'accountManager_id', 'id');
    }
    public function operator    ()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
}
