<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_unassinged extends Model
{
    protected $table = 'lead_unassinged';
    use HasFactory;
    public function leads_for()
    {
        return $this->belongsTo(lead_for::class, 'lead_for_ids', 'id');
    }
    public function leadFor()
    {
        return lead_for::findMany(explode(',', $this->lead_for_ids));
    }
}
