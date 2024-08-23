<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerifyNoticeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\UserProfileUpdateController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Lead\LeadProfileUpdateController;
use App\Http\Controllers\Lead\UpdateStatusController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lead\ShowController;
use App\Http\Controllers\Lead\DeleteController;
use App\Http\Controllers\Lead\LeadProfileController;

//use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| Route::get('/my_page', [TestController::class, 'index']);
*/

Route::get('/', [MainController::class, 'index'])->middleware('guest')->name('main_page');

//UsersController ------------------------------------------------------------------------------------------------------
Route::get('/profile', fn() => 'profile')->middleware('auth')->name('profile');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('login.logout');
Route::get('/user/{user}', [UserProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('user.profile');
Route::patch('/user/{user}', [UserProfileUpdateController::class, 'index'])->middleware(['auth', 'verified'])->name('user.update');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->name('password.update');

Route::get('/email/verify/', [EmailVerificationPromptController::class, '__invoke'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'] )->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verify-notice', [EmailVerifyNoticeController::class, '__invoke'])->middleware('auth')->name('verification.send');

// LeadControllers -----------------------------------------------------------------------------------------------------
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');

Route::get('/leadboard', [ShowController::class, 'index'])->middleware(['auth', 'verified'])->name('leadboard');

Route::delete('/leadboard/{lead}', [DeleteController::class, 'index'])->middleware(['auth', 'verified'])->name('leadboard.delete');

Route::post('/leadboard/{lead}/update-status', [UpdateStatusController::class, 'index'])->middleware(['auth', 'verified'])->name('leadboard.update_status');

Route::get('/leadboard/{lead}', [LeadProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('lead');
Route::patch('/leadboard/{lead}', [LeadProfileUpdateController::class, 'index'])->middleware(['auth', 'verified'])->name('lead.update');



