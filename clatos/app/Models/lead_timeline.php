<?php

namespace App\Models;

use App\Models\leads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lead_timeline extends Model
{
    use HasFactory;
    protected $table = 'lead_timeline';

    public function leadData()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
    public function heading()
    {
        $agent = $this->agent ? $this->agent->name : '.';
        return $this->heading = match ($this->type) {

            'invoice' => 'Invoice created',
            'Proforma' => 'Proforma created',
            'missedcall' => '<span class="text-danger"> Missed Call </span> ',
            'outgoing' => 'Outgoing Call by ' . $agent,
            'incoming' => 'Call by' . $this->leadData->isCustomer ? 'customer' : 'lead',
            'documentadded' => 'Document Inserted',
            'supportTicket' => 'Support ticket Created By Customer',
            'emailsend' => 'Email send to the',
            // 'comment' => '',
            // 'emailrecived' => '<span class=" opacity-50 material-icons-round"> send </span>',
            'agentfeedbackforcustomer' => 'Manger added Feedback',
            'agentcommentadded' => 'Manger added comment',
            'hardwareIdChange' => 'Hardware ID Change',
            'managerChangeReason' => 'Manager Change ',
            default => '-',
        };
    }
    public function icon()
    {
        return $this->icon = match ($this->type) {

            'invoice' => '<i class="fs-2qx ki-duotone ki-document text-success"><i class="path1"></i><i class="path2"></i></i>',
            'Proforma' => '<i class="fs-2qx ki-duotone ki-notepad text-info"><i class="path1"></i><i class="path2"></i><i class="path3"></i><i class="path4"></i><i class="path5"></i></i>',
            'missedcall' => ' <span class=" opacity-50 material-icons-round text-danger"> phone_missed </span>',
            'outgoing' => '<span class=" opacity-50 material-icons-round"> support_agent </span>',
            'incoming' => '<span class=" opacity-50 material-icons-round text-primary"> phone_callback </span>',
            // 'comment' => '<span class=" opacity-50 material-icons-round"> insert_comment </span>',
            'documentadded' => '<span class="material-icons-two-tone  opacity-50">attach_file</span>',
            'supportTicket' => '<i class="fs-2qx ki-duotone ki-call"> <i class="path1"></i> <i class="path2"></i> <i class="path3"></i> <i class="path4"></i> <i class="path5"></i> <i class="path6"></i> <i class="path7"></i> <i class="path8"></i></i>',
            'emailsend' => '<i class="ki-duotone ki-send fs-1"><span class="path1"></span><span class="path2"></span></i>',
            // 'emailrecived' => '<span class=" opacity-50 material-icons-round"> send </span>',
            'agentfeedbackforcustomer' => '<span class=" opacity-50 material-icons-round">comment</span>',
            'agentcommentadded' => '<span class=" opacity-50 material-icons-round"> manage_accounts </span>',
            'hardwareIdChange' => '<span class=" opacity-50 fs-2tx material-icons opacity-75 position-absolute text-primary"> memory </span> <span class=" material-icons-round opacity-75 ps-5 pt-3 text-gray-700 z-index-3"> vpn_key </span>',
            'managerChangeReason' => '<span class="material-icons-round text-gray-600 fs-5"> person </span> <span class=" fs-2tx material-icons opacity-75 position-absolute text-primary"> sync </span>',
            default => '<span class=" opacity-50 material-icons-round"> note </span>',
        };
    }
}
/*
<span class="material-icons-two-tone  opacity-50">attach_file</span>
<i class="ki-duotone ki-call"> <i class="path1"></i> <i class="path2"></i> <i class="path3"></i> <i class="path4"></i> <i class="path5"></i> <i class="path6"></i> <i class="path7"></i> <i class="path8"></i></i>

<i class="ki-duotone ki-notepad"><i class="path1"></i><i class="path2"></i><i class="path3"></i><i class="path4"></i><i class="path5"></i></i>
<i class="ki-duotone ki-document"><i class="path1"></i><i class="path2"></i></i>


<span class="material-icons-round">
comment
</span>

////new


documentadded
incoming
outgoing
emailsend
agentfeedbackforcustomer  => <span class=" opacity-50 material-icons-round">comment</span>
agentcommentadded
Proforma
Invoice
supportTicket
managerChangeReason
hardwareIdChange
*/