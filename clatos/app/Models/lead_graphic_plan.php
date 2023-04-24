<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_graphic_plan extends Model
{
    protected $table = 'lead_graphic_plan';
    use HasFactory;
    public function plan()
    {
        return $this->belongsTo(graphic_plan::class, 'graphic_plan_id', 'id');
    }
}
