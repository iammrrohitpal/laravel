<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/',[LoginRegisterController::class,'index'])->name('index');
Route::get('profile',[LoginRegisterController::class,'profile'])->name('profile');
// Route::get('/',[LoginRegisterController::class,'checklogin'])->name('checklogin');
Route::post('signup',[LoginRegisterController::class,'signup'])->name('signup');
Route::post('signin',[LoginRegisterController::class,'signin'])->name('signin');
Route::get('dashboard',[LoginRegisterController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::get('logout',[LoginRegisterController::class,'logout'])->name('logout');
