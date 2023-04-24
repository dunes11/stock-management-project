<?php

namespace App\Models;

use App\Models\leads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;
    use HasFactory;
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function ProductVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
