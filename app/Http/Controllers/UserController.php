<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userdashboard(){
        $userGroups = UserGroup::with('group')->where('user_id', Auth::id())->get();
        return view('users.dashboard', ['userGroups' => $userGroups]);
    }

}