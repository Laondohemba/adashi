<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function usersignupform(){
        return view('users.signup');
    }
    public function login(){
        return view('users.login');
    }

    public function createuser(Request $request){
        $user_data = $request->validate([
            'username'=> ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'max:255', 'unique:users', 'email'],
            'phone' => ['required', 'max:11'],
            'password' => ['required', 'min:8', 'confirmed', 'regex: /[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[!@#$%^&*()_+{}:><,.?]/'],
        ],
        [
            'password.regex' => 'Password must contain at least one uppercase lowercase, numeric and special character'
        ]
    );

    $user = User::create($user_data);

    Auth::login($user);
    return redirect()->route('userdashboard');
    }

    public function userlogout(){
        
        $user = request()->user();

        Auth::logout($user);
        return redirect()->route('login');
    }

    public function userlogin(Request $request){
        $user = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($user, $request->remember)){
            return redirect()->intended('user/dashboard');
        }else{
            return back()->withErrors([
                'loginfailed' => 'Invalid username or password! Note that passwords are case sensitive.'
            ]);
        }
    }
}
