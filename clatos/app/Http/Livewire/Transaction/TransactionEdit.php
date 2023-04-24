<?php

namespace App\Http\Livewire\Transaction;

use App\Models\company;
use App\Models\payment_mode;
use App\Models\transactions;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class TransactionEdit extends Component
{
    use WithFileUploads;

    public $companyData, $paymentData, $accountMangerData, $lead_id, $e;
    public $post = [];

    public function mount($lead_id)
    {
        $this->post = collect(transactions::find($lead_id));
        $this->post['lead_id']              = $lead_id;
        $this->post['isGatewayTransaction'] = 0;
        $this->paymentData                  = payment_mode::select('id', 'mode')->get();
        $this->companyData                  = company::select('id', 'name')->get();
        $this->accountMangerData            = User::select('id', 'name')->get();
        // dd($this->companyData);
    }
    public function render()
    {

        return view('livewire.transaction.transaction-edit')->extends('layouts.app')->section('content');
    }
    public function leadTransactionFormEdit($id)
    {
        // dd($this->post);
        $transaction = transactions::find($id);
        // dd($transaction);
        $validatedData = $this->validate([
            'post.lead_id'              => 'required',
            'post.isGatewayTransaction' => 'nullable|boolean',
            'post.amount'               => 'required|numeric|min:0',
            'post.transactionId'        => 'nullable|required',
            'post.transactionDateTime'  => 'required',
            'post.invoice_id'           => 'nullable|integer',
            'post.remarks'              => 'nullable|string',
            'post.paymentPurpose'       => 'nullable|string',
            'post.isApproved'           => 'nullable|boolean',
            'post.accountManager_id'    => 'nullable|integer',
            'post.company_id'           => 'nullable|integer',
            'post.paymentMode_id'       => 'required',
        ], //validation for field which is required
            [
                'post.amount.required'              => 'The :attribute field is required.',
                'post.transactionId.required'       => 'The :attribute field is required.',
                'post.transactionDateTime.required' => 'The :attribute field is required.',
                'post.paymentMode_id.required'      => 'The :attribute field is required.',
                'post.lead_id.required'             => 'The :attribute field is required.',
                'post.amount.required'              => 'The :attribute field is required.',
                'post.amount.numeric'               => 'The :attribute must be a number.',
                'post.amount.min'                   => 'The :attribute must be at least :min.',
                'post.paymentScreenshot.image'      => 'The :attribute must be an image file.',
                'post.paymentScreenshot.max'        => 'The :attribute may not be greater than :max kilobytes.',
            ], //msg for valdation error
            [
                'post.lead_id'              => 'Lead ID',
                'post.isGatewayTransaction' => 'Gateway Transaction',
                'post.amount'               => 'Amount',
                'post.transactionId'        => 'Transaction ID',
                'post.transactionDateTime'  => 'Transaction Date/Time',
                'post.invoice_id'           => 'Invoice ID',
                'post.remarks'              => 'Remarks',
                'post.paymentScreenshot'    => 'Payment Screenshot',
                'post.paymentPurpose'       => 'Payment Purpose',
                'post.isApproved'           => 'Is Approved',
                'post.accountManager_id'    => 'Account Manager ID',
                'post.company_id'           => 'Company ID',
                'post.paymentMode_id'       => 'Payment Mode ID',
            ]); //custom name for field for give in error

        try {
            $transaction->lead_id              = $this->post['lead_id'] ?? null;
            $transaction->isGatewayTransaction = $this->post['isGatewayTransaction'] ?? null;
            $transaction->amount               = $this->post['amount'] ?? null;
            $transaction->transactionId        = $this->post['transactionId'] ?? null;
            $transaction->transactionDateTime  = $this->post['transactionDateTime'] ?? null;
            $transaction->invoice_id           = $this->post['invoice_id'] ?? null;
            $transaction->remarks              = $this->post['remarks'] ?? null;
            $transaction->paymentScreenshot    = $this->post['paymentScreenshot'] ?? null;
            $transaction->paymentPurpose       = $this->post['paymentPurpose'] ?? null;
            $transaction->isApproved           = $this->post['isApproved'] ?? null;
            $transaction->remarks              = $this->post['remarks'] ?? null;
            $transaction->accountManager_id    = $this->post['accountManager_id'] ?? null;
            $transaction->company_id           = $this->post['company_id'] ?? null;
            $transaction->paymentMode_id       = $this->post['paymentMode_id'] ?? null;
            $transaction->update();
            // dd($transaction);
        } catch (QueryException $e) {
            dd($e->getMessage());
        }
        return redirect()->route('transaction.list');

    }
}
