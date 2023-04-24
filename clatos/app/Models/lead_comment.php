<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_comment extends Model
{
    protected $table = 'lead_comment';
    use HasFactory;
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
}
