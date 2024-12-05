<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/user.signup', [AuthController::class, 'usersignupform'])->name('usersignupform');
    Route::get('/user.login', [AuthController::class, 'login'])->name('userloginform');

    Route::post('/user.signup', [AuthController::class, 'createuser'])->name('createuser');
    Route::post('/user.login', [AuthController::class, 'userlogin'])->name('userlogin');
    Route::get('/admin.login', [AdminController::class, 'adminloginform'])->name('adminloginform');
    Route::post('/admin.login', [AdminController::class, 'adminlogin'])->name('adminlogin');
});

Route::middleware('auth')->group(function () {

    Route::get('/user.dashboard', [UserController::class, 'userdashboard'])->name('userdashboard');
    Route::post('/user.dashboard', [AuthController::class, 'userlogout'])->name('userlogout');


    Route::get('/admin.dashboard', [AdminController::class, 'index'])->name('admindashboard');
    Route::get('/admin.create', [AdminController::class, 'create'])->name('addadminform');
    Route::post('/admin.create', [AdminController::class, 'store'])->name('createadmin');
    // Route::get('/admin.groups', [AdminController::class, 'showgroups'])->name('showgroups');

    Route::get('admin.groups', [GroupController::class, 'index'])->name('showgroups');
    Route::get('/group.create', [GroupController::class, 'create'])->name('creategroup');
    ROute::post('/group.create', [GroupController::class, 'store'])->name('admincreategroup');


});
