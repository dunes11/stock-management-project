<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orderItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'order_item';
    
    public function accountManager()
    {
        return $this->belongsTo(user::class, 'accountManager_id','id');
    }

     public function companyName()
    {
        return $this->belongsTo(company::class, 'company_id', 'id');
    }
    
     public function productName()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
 
}
