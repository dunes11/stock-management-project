<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class support_pending extends Model
{
    protected $table = 'support_ticket_pending';
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
}
