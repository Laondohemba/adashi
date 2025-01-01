<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateadminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adminData = $request->validate([
            'username' => ['required', 'max:255', 'unique:admins'],
            'email' => ['required', 'max:255', 'unique:admins', 'email'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[!@#$%^&*()_":><,.]/'],
        ],
        [
            'password.regex' => 'Password must at least one contain lowercase, uppercase, numeric and special character.'
        ]
    );
        //hash password
        $adminData['password'] = Hash::make($adminData['password']);

        //create admin
        $admin = Admin::create($adminData);

        Auth::login($admin);
        return redirect()->route('admindashboard');
        
    }

    //login form display
    public function adminloginform(){
        return view('admins.login');
    }

    //admin login
    public function adminlogin(Request $request){
        
        $adminData = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($adminData, $request->remember)){
            return redirect()->route('admin.dashboard');
        }else{
            return back()->withErrors([
                'loginfailed' => 'Invalid credentials! Note that passwords are case sensitive.'
            ]);
        }
        // dd($adminData);
    }

    public function showgroups(){
        return view('admins.groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
