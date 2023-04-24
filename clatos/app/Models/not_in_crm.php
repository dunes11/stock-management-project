<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class not_in_crm extends Model
{
    protected $table = 'call_log_notincrm';
    use HasFactory;
    public function agentName()
    {
        return $this->belongsTo(User::class,'id','agent_id');
    }
}
