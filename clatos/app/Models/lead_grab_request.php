<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_grab_request extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'lead_user_change_approve';

    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }

    public function oldAssignTo()
    {
        return $this->belongsTo(User::class, 'oldAssignedTo_id', 'id');
    }
    public function newAssignTo()
    {
        return $this->belongsTo(User::class, 'newAssignedTo_id', 'id');
    }
    public function changeByuser()
    {
        return $this->belongsTo(User::class, 'changeByUser_id', 'id');
    }
}
