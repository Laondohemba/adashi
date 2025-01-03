<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Interest;
use App\Models\Payment;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //display payments for admin
    public function payments()
    {
        $payments = Payment::with('user')->with('group')->get();
        return view('admins.payments', ['payments' => $payments]);
    }

    //admin approve payments
    public function approvePayment($id)
    {
        $payment = Payment::find($id);

        //update payment status in payments table
        $payment->update(['status' => 'approved']);

        //update user group status
        $userGroup = UserGroup::where('user_id', $payment->user_id)->where('group_id', $payment->group_id)->first();
        $userGroup->update(['payment_status' => 'paid']);

        //insert charges into interest table
        $data = [
            'user_id' => $payment->user_id,
            'payment_id' => $id,
            'amount' => $payment->charges,
        ];

        Interest::create($data);

        //update user's account balance
        $payment->user->increment('account_balance', $payment->amount);

        return redirect()->route('admin.payments')->with('success', 'Payment approved');
    }

    //show user payments
    public function index()
    {
        $payments = Payment::with('group')->where('user_id', Auth::id())->get();
        return view('users.payments', ['payments' => $payments]);
    }

    //user request payment
    public function requestPayment($id)
    {
        $group = Group::find($id);
        $max_amount = $group->amount * $group->max_members;
        $interest_rate = 4/100;
        $interest = $max_amount * $interest_rate;
        
        $amount = $max_amount - $interest;

        $already_requested = Payment::where('user_id', Auth::id())->where('group_id', $id)->first();
        // dd($already_requested);
        if($already_requested != null)
        {
            return back()->with("alreadyRequested{$id}", 'Your requested has already been received.');
        }

        $data = [
            'group_id' => $id,
            'amount' => $amount,
            'charges' => $interest
        ];

        if(Auth::user()->payments()->create($data))
        {
            return redirect()->route('user.payments')->with('success', 'Your payment request has been received');
        }

    }

}
