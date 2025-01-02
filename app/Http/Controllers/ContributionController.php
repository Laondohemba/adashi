<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    public function contribute(Request $request, $id)
    {
        
        $request->validate([
            'round' => ['required', 'numeric']
        ]);
        $group = Group::find($id);
        $user = request()->user();

        if($group->amount > $user->account_balance)
        {
            return back()->withErrors([
                'insufficient_balance' => 'Insufficient balance! Deposit into your account and continue.'
            ]);
        }
        $data = [
            // 'user_id' => request()->user()->id,
            'group_id' => $id,
            'amount' => $group->amount,
            'round' => $request->round,
        ];

        if(Auth::user()->contributions()->create($data))
        {
            $user->decrement('account_balance', $group->amount);
            return redirect()->route('userdashboard')->with('success', 'Contribution made successfully');
        }
        else
        {
            return redirect()->route('userdashboard')-with('error', 'Unable to make contribution');
        }

        dd($data);
    }
}
