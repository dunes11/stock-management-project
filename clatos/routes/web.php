<?php

use App\Http\Livewire\NotInCrm;

use App\Http\Livewire\EmailApproval;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\HardwareChange;
use App\Http\Livewire\LeadUnassinged;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\leadGrabRequest;
use App\Http\Livewire\Tickets\CartLeads;
use App\Http\Livewire\Tickets\DueTickets;
use App\Http\Controllers\searchController;

use App\Http\Livewire\Tickets\CloseTicket;
use App\Http\Livewire\Tickets\NewLeadsTickets;
use App\Http\Livewire\Tickets\UpcomingTickets;
use App\Http\Livewire\Tickets\MissedCallTickets;
use App\Http\Livewire\Tickets\IncomingCallTickets;

//----------------------- Begin :: Comman Routes -------------------------//
Auth::routes();
Route::get('/', function () {
    if (Auth::check()) {
        return view('layouts.app');
    }
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('layouts.app');
})->name('dashboard');
Route::view('homepage', 'layouts.app');
//------------------------- End :: Comman Routes -------------------------//

//---------------- Begin :: Single Pages Routes --------------------------//
Route::get('hardwarechanges', HardwareChange::class)->name('hardwarechange'); // H/W ID
Route::get('leads/unassigned', App\Http\Livewire\Leads\Unassigned::class)->name('unassigned'); // Unassigned
// Route::get('leads/unassigned', LeadUnassinged::class)->name('unassigned'); // Unassigned
Route::get('emailapproval', EmailApproval::class)->name('emailapproval'); //emailapproval
Route::get('leads/grabrequests', leadGrabRequest::class)->name('leadgrabrequest'); //leadgrabrequest
Route::get('leads/upcomingtickets', UpcomingTickets::class)->name('upcomingtickets'); //upcomingtickets
Route::get('notincrm', NotInCrm::class)->name('notincrm'); //notincrm

//------------------------------- begin tickets-----------------------------------
Route::get('leads/closeticket', CloseTicket::class)->name('leads/closeticket'); //closeticket
Route::get('leads/newtickets', NewLeadsTickets::class)->name('leads/newtickets'); //leads/newtickets
Route::get('leads/cart', CartLeads::class)->name('leads/cart'); //leads/cart
Route::get('leads/duetickets', DueTickets::class)->name('leads/duetickets'); //leads/cart
Route::get('leads/upcomingtickets', UpcomingTickets::class)->name('leads/upcomingtickets'); //upcomingtickets
Route::get('leads/missedcalltickets', MissedCallTickets::class)->name('leads/missedcalltickets'); //leads/cart
Route::get('leads/incomingcalltickets', IncomingCallTickets::class)->name('leads/incomingcalltickets'); //leads/cart
// ---------------------------end tickets-----------------------------------------
//Begin Support

Route::prefix('support/')->name('support.')->group(function () {
    Route::get('complete', App\Http\Livewire\Support\Complete::class)->name('complete');
    Route::get('pending', App\Http\Livewire\Support\Pending::class)->name('pending');
    Route::get('processing', App\Http\Livewire\Support\Processing::class)->name('processing');
});

//End Support

//---------------- End :: Single Pages Routes -----------------------------//

######################## Begin :: Module Routes ########################################

//---------------- Begin :: Lead Module ----------------------//
Route::get('leads', App\Http\Livewire\Lead::class)->name('leads'); // List
Route::get('lead/add', App\Http\Livewire\Lead\Add::class)->name('lead.add'); // Add
Route::get('lead/edit/{id}', App\Http\Livewire\Lead\Edit::class)->name('lead.edit'); //Edit
// Route::get('lead/timeline/{id}', App\Http\Livewire\Lead\Show::class)->name('lead.show'); //Timeline
/// lead Pages
Route::controller(App\Http\Controllers\leadController::class)->group(function () {
    //lead flags update
    Route::post('lead/update/flag/', 'leadFlags')->name('lead.update.flag');
    Route::prefix('lead/')->name('lead.')->group(function () {
        Route::get('profile/{lead}', 'profile')->name('profile');
        Route::get('invoices/{lead}', 'invoices')->name('invoices');
        Route::get('timeline/{lead}', 'timeline')->name('timeline');
        Route::get('contacts/{lead}', 'contacts')->name('contacts');
        Route::get('support/tickets/{lead}', 'tickets')->name('tickets');
        Route::get('address/edit/{id}', 'addressEdit')->name('address.edit');
        Route::post('address/update', 'addressUpdate')->name('address.update');
        Route::get('followUps/{lead}', 'followUps')->name('followUps');
        Route::get('comments/{lead}', 'comments')->name('comments');
        Route::get('emails/{lead}', 'emails')->name('emails');
        Route::get('orders/{lead}', 'orders')->name('orders');
        Route::get('transaction/{lead}', 'transaction')->name('transaction');
        Route::get('documents/{lead}', 'documents')->name('documents');
        Route::get('licence/{lead}', 'licence')->name('licence');
        Route::get('brands/{lead}', 'brands')->name('brands');
        Route::get('projects/{lead}', 'projects')->name('projects');
        Route::get('hardwarechange/{lead}', 'hardwarechange')->name('hardwarechange');
        Route::get('callLogs/{lead}', 'callLogs')->name('callLogs');
    });
});
//---------------- End :: Lead Module ------------------------//

//Begin transaction
Route::prefix('transaction/')->name('transaction.')->group(function () {
    Route::get('add/{lead_id}', App\Http\Livewire\Transaction\TransactionAdd::class)->name('add');
    Route::get('list', App\Http\Livewire\Transaction\TransactionList::class)->name('list');
    Route::get('edit/{lead_id}', App\Http\Livewire\Transaction\TransactionEdit::class)->name('edit');
});

//-------------------End-Transaction

//-------------------Begin-Task Module

Route::prefix('task/')->name('task.')->group(function () {
    Route::get('add', App\Http\Livewire\task\Add::class)->name('add');
    Route::get('edit/{id}', App\Http\Livewire\task\Edit::class)->name('edit');
    Route::get('all', App\Http\Livewire\task\All::class)->name('all');
    Route::get('pending', App\Http\Livewire\task\Pending::class)->name('pending');
    Route::get('complete', App\Http\Livewire\task\Complete::class)->name('complete');
});
//-------------------End-Task Module


//---------------- Begin :: Order Module ----------------------//
Route::get('orders', App\Http\Livewire\Order\OrderList::class)->name('orders'); // List
Route::get('orders/add/{leadId}', App\Http\Livewire\Order\OrderAdd::class)->name('orders.add'); // Add

//---------------- Begin :: Order Module ------------------------//
Route::get('invoice/add/{userName}', App\Http\Livewire\Invoice\Add::class)->name('invoice.add'); // Add

//-----------------End :: Invoice Module ---------------------//

//-----------------Begin :: Invoice Module ---------------------//


//---------------- Begin :: Roles Permission Module ----------------------//
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
//---------------- Begin :: Roles Permission Module ----------------------//

//---------------- Begin :: Search Module ----------------------//
Route::get('/search', [searchController::class, 'headerSearch'])->name('header.search');
//---------------- End :: Search Module ----------------------//

######################## End :: Modules Routes ########################################

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // dont Delete
// Route::view('test', 'test/test');
// Route::post('test/submit', [test::class, 'store'])->name('test.sub');
//check only for repeater demo

// Route::get('check/{lead_id}', Check::class)->name('check');
// Route::get('show', Show::class)->name('show');
