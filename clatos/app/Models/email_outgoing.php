<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\email_signature;

class email_outgoing extends Model
{

    use HasFactory;
    protected $table = 'email_outgoing';
    public function sender()
    {
        return $this->belongsTo(User::class, 'senderUser_id', 'id');
    }
    public function sing()
    {
        return  $this->belongsTo(email_signature::class, 'email_signature_id', 'id');
    }
    public function templet()
    {
        return $this->belongsTo(email_template::class, 'email_template_id', 'id');
    } //email_template
}
