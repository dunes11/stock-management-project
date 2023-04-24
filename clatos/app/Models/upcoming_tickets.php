<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class upcoming_tickets extends Model
{
    protected $table = 'upcoming_tickets';
    use HasFactory;
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assignedTo_id', 'id');
    }
    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assignedBy_id', 'id');
    }
}


