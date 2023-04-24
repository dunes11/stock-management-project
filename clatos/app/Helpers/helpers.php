<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

function hostData()
{
    $host = request()->getHost();
    return DB::table('login_host')->where('hostname', $host)->first();
}
function countRecordsForHeaderQuickAccessMenu()
{
    DB::beginTransaction();

    try {

        // $headerMenuCounts['new'] =
        //     DB::table('new_tickets')->count();
        $headerMenuCounts['followup'] = DB::table('due_tickets')->count();
        // $headerMenuCounts['support'] = DB::table('support_ticket_pending')->count();
        $headerMenuCounts['missed'] = DB::table('missed_call_tickets')->count();
        $headerMenuCounts['incoming'] = DB::table('feedback_needed_tickets')->count();
        $headerMenuCounts['upcoming'] = DB::table('upcoming_tickets')->count();
        $headerMenuCounts['task'] = DB::table('task_pending')->count();
        $headerMenuCounts['cart'] = DB::table('cart_leads')->count();

        DB::commit();
        return $headerMenuCounts;
    } catch (\Exception $e) {
        DB::rollback();
        return $e;
    }
}

function countRecordsForSidebarMenu()
{

    DB::beginTransaction();

    try {

        $sidebarMenuCounts['hwchange'] = DB::table('license_hardwareid_change')->count();
        $sidebarMenuCounts['closeTkt'] = DB::table('close_ticket_request')->count();
        $sidebarMenuCounts['grabLead'] = DB::table('lead_user_change_approve')->count();
        $sidebarMenuCounts['unassigned'] = DB::table('lead_unassinged')->count();
        $sidebarMenuCounts['notInCrm'] = DB::table('call_log_notincrm')->count();
        $sidebarMenuCounts['emailApproval'] = DB::table('email_outgoing_unapproved')->count();
        DB::commit();
        return $sidebarMenuCounts;
    } catch (\Exception $e) {
        DB::rollback();
        return $e;
    }
}
function getPulse()
{
    $pulse = DB::table('settings')->where('name', '=', 'calling_balance')->first();
    return $pulse;
}
function returnCollection($arr)
{
    return json_decode(json_encode(collect($arr)->all()), true);
}
function leadUsers()
{
    return  User::where('isAvailableForLead', 1)->where('isActive', 1)->get(['id', 'name']);
}
