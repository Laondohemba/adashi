<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepositController extends Controller
{
    public function create(){
        return view('deposits.create');
    }

    public function store(Request $request){
        $amount_deposited = $request->validate([
            'amount_deposited' => ['required', 'min:5']
        ],
        [
            'amount_deposited.min' => 'Minimum amount to deposit is 10000'
        ]);

        Auth::user()->deposits()->create($amount_deposited);
        return redirect()->route('deposits.history');
    }

    public function history(){
        $deposits = Deposit::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('deposits.history', ['deposits' => $deposits]);
    }

    public function depositProof(Request $request, $id){
        $request->validate([
            'proof_of_deposit' => ['required', 'file', 'max:1000', 'mimes:png,jpg,webp']
        ]);
        $path = Storage::disk('public')->put('proofs_of_deposit', $request->proof_of_deposit);

        $updated_deposit = Deposit::find($id);

        $updated_deposit->update(['proof_of_deposit' => $path]);
        return redirect()->route('deposits.history');
    }

    public function index(){
        $deposits = Deposit::with('userDeposits')->whereNotNull('proof_of_deposit')->get();
        // dd($deposits); 
        return view('admins.deposits', ['deposits' => $deposits]);
    }

    public function pendingDeposits(){
        $pendingDeposits = Deposit::with('userDeposits')->whereNotNull('proof_of_deposit')->where('status', 'pending')->get();
        return view('admins.pending_deposits', ['pendingDeposits' => $pendingDeposits]);
    }

    public function approveDeposit(Request $request, $id){
        $request->validate([
            'amount_approved' => ['required']
        ]);
        $deposit = Deposit::find($id);

        $deposit->update([
            'amount_approved' => $request->amount_approved,
            'status' => 'Approved'
        ]);

        //update users account balance
        $deposit->userDeposits->increment('account_balance', $request->amount_approved);

        return redirect()->route('deposits.index');
    }
}
