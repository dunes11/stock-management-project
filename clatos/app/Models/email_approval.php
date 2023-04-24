<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_approval extends Model
{
    use HasFactory;
    protected $table = 'email_outgoing_unapproved';
    
    public function emailTemplate()
    {
        return $this->belongsTo(email_template::class, 'email_template_id', 'id');
    }
    public function emailSignature()
    {
        return $this->belongsTo(email_signature::class, 'email_signature_id', 'id');
    }

}
