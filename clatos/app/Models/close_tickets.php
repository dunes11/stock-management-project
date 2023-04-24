<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class close_tickets extends Model
{
    protected $table = 'close_ticket_request';
    use HasFactory;
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
}
