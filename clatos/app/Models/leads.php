<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\lead_timeline;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class leads extends Model
{
    protected $table = 'lead';
    use HasFactory;
    public $timestamps = false;

    public function accManager()
    {
        return $this->belongsTo(User::class, 'assignedTo_id', 'id');
    }
    public function addresses()
    {
        return $this->hasMany(lead_address::class, 'lead_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(orders::class, 'lead_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'lead_id', 'id');
    }
    public function logs()
    {
        return $this->hasMany(lead_timeline::class, 'lead_id', 'id')->orderBy('datetime', 'desc');
    }
    public function leadInvoices()
    {
        return $this->hasMany(invoice::class, 'lead_id', 'id')->orderBy('date', 'desc');
    }
    public function contacts()
    {
        return $this->hasMany(leads::class, 'parent_id', 'id');
    }
    public function currentStatus()
    {
        return $this->belongsTo(lead_status::class, 'lead_status_id', 'id');
    }
    public function leadTicket()
    {
        return $this->hasMany(support_ticket::class, 'lead_id', 'id')->orderBy('datetime', 'desc');
    }
    public function leadFor()
    {
        return lead_for::findMany(explode(',', $this->lead_for_ids));
    }
}
