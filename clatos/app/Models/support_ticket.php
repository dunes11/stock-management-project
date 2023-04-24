<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class support_ticket extends Model
{
    protected $table = 'support_ticket';
    use HasFactory;

    public function productDetails()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
