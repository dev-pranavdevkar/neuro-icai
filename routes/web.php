<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\LoginController;
use  App\Http\Controllers\frontend\SignupController;
use App\Http\Controllers\frontend\ForgetPasswordController;
use App\Http\Controllers\V1\Website\WebAuthController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/login',[LoginController::class, 'index']);
Route::get('/signup',[SignupController::class, 'index']);
Route::get('/forgetPassword',[ForgetPasswordController::class, 'index']);
Route::post('/signup', [WebAuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [WebAuthController::class, 'userLogin'])->name('userLogin');
Route::post('/forgetPassword', [WebAuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/verifyOtp', [WebAuthController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/changeForgetPassword', [WebAuthController::class, 'changeForgetPassword'])->name('changeForgetPassword');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');

