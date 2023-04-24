<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class license extends Model
{
    use HasFactory;
    protected $table = 'license';
    // public function product()
    // {
    //     return $this->belongsTo(product::class, 'product_id', 'id');
    // }
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
}
