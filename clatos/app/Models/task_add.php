<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_add extends Model
{
    
    protected $table="task";
    public $timestamps = false;

    use HasFactory;
}
