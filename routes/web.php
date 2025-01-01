<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthenticate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/user/signup', [AuthController::class, 'usersignupform'])->name('usersignupform');
    Route::get('/user/login', [AuthController::class, 'login'])->name('login');

    Route::post('/user/signup', [AuthController::class, 'createuser'])->name('createuser');
    Route::post('/user/login', [AuthController::class, 'userlogin'])->name('userlogin');
    Route::get('/admin/login', [AdminController::class, 'adminloginform'])->name('adminloginform');
    Route::post('/admin/login', [AdminController::class, 'adminlogin'])->name('adminlogin');
});

Route::prefix('admin')->middleware(AdminAuthenticate::class)->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/create', [AdminController::class, 'create'])->name('addadminform');
    Route::post('/create', [AdminController::class, 'store'])->name('createadmin');
    Route::get('/groups', [GroupController::class, 'index'])->name('showgroups');
    Route::get('/group/create', [GroupController::class, 'create'])->name('creategroup');
    Route::post('/group/create', [GroupController::class, 'store'])->name('admincreategroup');
    Route::get('groups/members/{group}', [GroupController::class, 'groupMembers'])->name('group.members');

    Route::post('group/members/{group}', [GroupController::class, 'approveMembership'])->name('group.approve');
    Route::get('/deposits', [DepositController::class, 'index'])->name('deposits.index');
    Route::get('/deposits/pending', [DepositController::class, 'pendingDeposits'])->name('deposits.pending');
    Route::post('/deposits/{deposit}', [DepositController::class, 'approveDeposit'])->name('deposits.approve');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

});


Route::middleware('auth')->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'userdashboard'])->name('userdashboard');
    Route::post('/user/dashboard', [AuthController::class, 'userlogout'])->name('userlogout');
    Route::post('/user/dashboard/{group}', [GroupController::class, 'joinGroup'])->name('user.joinGroup');
    Route::get('/user/groups', [GroupController::class, 'showGroupsForUser'])->name('user.showGroups');

    Route::get('/user/deposit', [DepositController::class, 'create'])->name('deposits.create');
    Route::post('/user/deposit', [DepositController::class, 'store'])->name('deposits.store');
    Route::get('/user/deposit/history', [DepositController::class, 'history'])->name('deposits.history');
    Route::post('/user/deposit/proof/{deposit}', [DepositController::class, 'depositProof'])->name('deposits.proof');

});
