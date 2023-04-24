<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hardware_change extends Model
{
    protected $table ='license_hardwareid_change';
    use HasFactory;
    public function lead()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id', 'id');
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approvedBy_id', 'id');
    }
    public function license()
    {
        return $this->belongsTo(license::class, 'license_id', 'id');
    }
    public function oldProduct()
    {
        return $this->belongsTo(Product::class,'oldProduct_id','id');
    }

    public function newProduct()
    {
        return $this->belongsTo(Product::class,'newProduct_id','id');
    }

    

}
