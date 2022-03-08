<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard.index');
    });
    //CRUD Outlet
    Route::resource('/dashboard/outlets', OutletController::class);

//CRUD User
    Route::resource('/dashboard/users', UserController::class);

//CRUD Paket
    Route::resource('/dashboard/packages', PackageController::class);

//CRUD Member
    Route::resource('/dashboard/members', MemberController::class);

//CRUD Outlet
    Route::resource('/dashboard/transactions', TransactionController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/pdf', [TransactionController::class, 'print_pdf']);
});

Route::middleware('guest')->group(function () {
    //Auth Controller
    Route::get('/login', [AuthController::class, 'index'])->name('login');

    Route::post('/login', [AuthController::class, 'auth'])->name('auth.login');
});

//add some comment


