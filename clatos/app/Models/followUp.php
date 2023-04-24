<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followUp extends Model
{
    protected $table = 'followup';
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
}
