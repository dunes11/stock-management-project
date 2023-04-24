<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_recived extends Model
{
    protected $table = 'email_incoming';
    use HasFactory;
}
