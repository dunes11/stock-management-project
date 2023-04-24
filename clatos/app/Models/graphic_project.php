<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\graphic_lead_brand;
use App\Models\graphic_plan;
use App\Models\graphic_project_category;
use App\Models\graphic_project_deliverable;


class graphic_project extends Model
{
    use HasFactory;
    protected $table = 'graphic_project';

    public function brand()
    {
        return $this->belongsTo(graphic_lead_brand::class, 'graphic_lead_brand_id', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(graphic_plan::class, 'lead_graphic_plan_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(graphic_project_category::class, 'graphic_project_category_id', 'id');
    }
    public function deliveryType()
    {
        return $this->belongsTo(graphic_project_deliverable::class, 'graphic_project_deliverable_id', 'id');
    }
}
