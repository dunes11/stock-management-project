<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_document extends Model
{
    use HasFactory;
    protected $table = 'lead_document';
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
}
