<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_address extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'billing_address';
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
}
